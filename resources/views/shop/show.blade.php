@extends('layouts.app')

@section('title', $product->name . ' - Anique')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <div class="main-image mb-4">
                        <img src="{{ asset($product->images[0] ?? 'images/product-1.png') }}" 
                            class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    @if(count($product->images) > 1)
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
                    <h1 class="product-title">{{ $product->name }}</h1>
                    
                    <div class="product-price mb-4">
                        @if($product->sale_price)
                        <span class="sale-price">${{ number_format($product->sale_price, 2) }}</span>
                        <span class="original-price">${{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="price">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>

                    <div class="product-description mb-4">
                        {!! $product->description !!}
                    </div>

                    <div class="product-meta mb-4">
                        <p><strong>SKU:</strong> {{ $product->sku }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        <p><strong>Availability:</strong> 
                            @if($product->stock > 0)
                                <span class="text-success">In Stock ({{ $product->stock }} available)</span>
                            @else
                                <span class="text-danger">Out of Stock</span>
                            @endif
                        </p>
                    </div>

                    @if($product->stock > 0)
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
        @if($relatedProducts->count() > 0)
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
</script>
@endpush 