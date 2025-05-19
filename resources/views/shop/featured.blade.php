@php
    $featuredProducts = \App\Models\Product::where('featured', true)->take(4)->get();
@endphp

@if($featuredProducts->count() > 0)

    @foreach($featuredProducts as $product)
    <div class="col-12 col-md-4 col-lg-3 mb-5">
        <div class="product-item">
            <a href="{{ route('shop.show', $product->slug) }}">
                <img src="{{ asset($product->images[0] ?? 'images/product-1.png') }}" class="img-fluid product-thumbnail">
            </a>
            <h3 class="product-title">{{ $product->name }}</h3>
            <strong class="product-price">${{ number_format($product->final_price, 2) }}</strong>

            <form action="{{ route('cart.store') }}" method="POST" class="add-to-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit">          
                      <span class="icon-cross">
                <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
            </span>
        </button>
            </form>
        </div>
    </div>
    @endforeach
@endif 
