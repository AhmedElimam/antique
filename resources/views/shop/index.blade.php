@extends('layouts.app')

@section('title', 'Shop - Anique')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <!-- Categories -->
                    <div class="widget">
                        <h3 class="mb-3">Categories</h3>
                        <ul class="list-unstyled">
                            <li class="{{ !request('category') ? 'active' : '' }}">
                                <a href="{{ route('shop.index') }}">All Products</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="{{ request('category') == $category->slug ? 'active' : '' }}">
                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Range -->
                    <div class="widget">
                        <h3 class="mb-3">Price Range</h3>
                        <form action="{{ route('shop.index') }}" method="GET">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <div class="mb-3">
                                <label for="min_price" class="form-label">Min Price</label>
                                <input type="number" class="form-control" id="min_price" name="min_price" 
                                    value="{{ request('min_price') }}" min="0">
                            </div>
                            <div class="mb-3">
                                <label for="max_price" class="form-label">Max Price</label>
                                <input type="number" class="form-control" id="max_price" name="max_price" 
                                    value="{{ request('max_price') }}" min="0">
                            </div>
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-lg-9">
                <!-- Sort Options -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="section-title">Products</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="{{ route('shop.index') }}" method="GET" class="d-inline">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('min_price'))
                                <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                            @endif
                            @if(request('max_price'))
                                <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                            @endif
                            <select name="sort" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-12 col-md-4 col-lg-4 mb-5">
                        <div class="product-item">
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <img src="{{ asset($product->images[0] ?? 'images/product-1.png') }}" 
                                    class="img-fluid product-thumbnail">
                            </a>
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ number_format($product->final_price, 2) }}</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center">No products found.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 