<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>
                        @switch(Route::currentRouteName())
                            @case('home')
                                Welcome To Anique
                                @break
                            @case('shop.index')
                                Shop
                                @break
                            @case('about')
                                About Us
                                @break
                            @case('services')
                                Our Services
                                @break
                            @case('blog')
                                Blog
                                @break
                            @case('contact')
                                Contact Us
                                @break
                            @case('cart')
                                Cart
                                @break
                            @default
                                Furni
                        @endswitch
                    </h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                    <p><a href="{{ route('shop.index') }}" class="btn btn-secondary text-white me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('images/couch.png') }}" class="img-fluid image-hero">
                </div>
            </div>
        </div>
    </div>
</div>