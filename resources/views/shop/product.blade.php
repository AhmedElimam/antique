@extends('layouts.app')

@section('title', isset($product) ? $product->name . ' - Anique' : 'Product - Anique')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <div class="main-image mb-4">
                        <img src="{{ asset($product->images[0] ?? 'images/product-1.png') }}" 
                            class="img-fluid" alt="{{ isset($product) ? $product->name : 'Product' }}">
                    </div>
                    @if(isset($product) && count($product->images) > 1)
                    <div class="row">
                        @foreach($product->images as $image)
                        <div class="col-3">
                            <img src="{{ asset($image) }}" class="img-fluid thumbnail" alt="{{ $product->name }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="product-details">
                    <h1 class="product-title">{{ isset($product) ? $product->name : 'Product' }}</h1>
                    
                    <div class="product-price mb-4">
                        @if(isset($product) && $product->sale_price)
                        <span class="sale-price">${{ number_format($product->sale_price, 2) }}</span>
                        <span class="original-price">${{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="price">${{ isset($product) ? number_format($product->price, 2) : '0.00' }}</span>
                        @endif
                    </div>

                    <div class="product-description mb-4">
                        {!! isset($product) ? $product->description : '' !!}
                    </div>

                    <div class="product-meta mb-4">
                        <p><strong>SKU:</strong> {{ isset($product) ? $product->sku : 'N/A' }}</p>
                        <p><strong>Category:</strong> {{ isset($product) && $product->category ? $product->category->name : 'N/A' }}</p>
                        <p><strong>Availability:</strong> 
                            @if(isset($product) && $product->stock > 0)
                                <span class="text-success">In Stock ({{ $product->stock }} available)</span>
                            @else
                                <span class="text-danger">Out of Stock</span>
                            @endif
                        </p>
                    </div>

                    @if(isset($product) && $product->variants->count() > 0)
                    <div class="product-variants mb-4">
                        <h4>Available Variants</h4>
                        @foreach($product->variants->groupBy('name') as $variantName => $variants)
                        <div class="variant-group mb-3">
                            <label class="form-label"><strong>{{ $variantName }}:</strong></label>
                            <div class="d-flex gap-2">
                                @foreach($variants as $variant)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" 
                                        name="variant[{{ $variantName }}]" 
                                        id="variant_{{ $variant->id }}"
                                        value="{{ $variant->id }}"
                                        data-price-adjustment="{{ $variant->price_adjustment }}"
                                        data-stock="{{ $variant->stock }}">
                                    <label class="form-check-label" for="variant_{{ $variant->id }}">
                                        {{ $variant->value }}
                                        @if($variant->price_adjustment > 0)
                                            (+${{ number_format($variant->price_adjustment, 2) }})
                                        @elseif($variant->price_adjustment < 0)
                                            (-${{ number_format(abs($variant->price_adjustment), 2) }})
                                        @endif
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(isset($product) && $product->stock > 0)
                    <form action="{{ route('cart.store') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                                    <input type="number" name="quantity" id="quantity" class="form-control text-center" 
                                        value="1" min="1" max="{{ $product->stock }}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="section-title">Related Products</h2>
            </div>
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <div class="product-item">
                    <a href="{{ route('shop.show', $relatedProduct->slug) }}">
                        <img src="{{ asset($relatedProduct->images[0] ?? 'images/product-1.png') }}" 
                            class="img-fluid product-thumbnail">
                    </a>
                    <h3 class="product-title">{{ $relatedProduct->name }}</h3>
                    <strong class="product-price">${{ number_format($relatedProduct->final_price, 2) }}</strong>

                    <span class="icon-cross">
                        <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Featured Products -->
        @include('shop.featured')
    </div>
</div>
@endsection

@push('scripts')
<script>
function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const currentValue = parseInt(input.value);
    if (currentValue < max) {
        input.value = currentValue + 1;
    }
}

function decrementQuantity() {
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}

// Handle variant selection
document.addEventListener('DOMContentLoaded', function() {
    const variantInputs = document.querySelectorAll('input[name^="variant"]');
    const basePrice = {{ isset($product) ? $product->price : 0 }};
    const priceDisplay = document.querySelector('.product-price .price, .product-price .sale-price');
    
    variantInputs.forEach(input => {
        input.addEventListener('change', function() {
            let totalAdjustment = 0;
            let minStock = {{ isset($product) ? $product->stock : 0 }};
            
            // Calculate total price adjustment and find minimum stock
            document.querySelectorAll('input[name^="variant"]:checked').forEach(checkedInput => {
                totalAdjustment += parseFloat(checkedInput.dataset.priceAdjustment);
                const variantStock = parseInt(checkedInput.dataset.stock);
                if (variantStock < minStock) {
                    minStock = variantStock;
                }
            });
            
            // Update price display
            const newPrice = basePrice + totalAdjustment;
            if (priceDisplay) {
                priceDisplay.textContent = '$' + newPrice.toFixed(2);
            }
            
            // Update quantity input max value
            const quantityInput = document.getElementById('quantity');
            if (quantityInput) {
                quantityInput.setAttribute('max', minStock);
                if (parseInt(quantityInput.value) > minStock) {
                    quantityInput.value = minStock;
                }
            }
        });
    });
});
</script>
@endpush 