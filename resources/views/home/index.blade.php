@extends('layouts.app')

@section('title', 'Anique - Modern Interior Design Studio')

@php
    $showHero = true;
@endphp

@section('content')
    <!-- /*
    * Bootstrap 5
    * Template Name: Furni
    * Template Author: Untree.co
    * Template URI: https://untree.co/
    * License: https://creativecommons.org/licenses/by/3.0/
    */ -->
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Untree.co">
      <link rel="shortcut icon" href="favicon.png">

      <meta name="description" content="" />
      <meta name="keywords" content="bootstrap, bootstrap4" />

    	<!-- Bootstrap CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    	<link href="css/tiny-slider.css" rel="stylesheet">
    	<link href="css/style.css" rel="stylesheet">
    	<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
    </head>

    <body>

        <!-- Start Product Section -->
        <div class="product-section">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div> 
                    <!-- Start Products Column  -->
					 @include('shop.featured')
                    <!-- End Products Column -->
                </div>
            </div>
        </div>
        <!-- End Product Section -->

        <!-- Start Why Choose Us Section -->
        <div class="why-choose-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <h2 class="section-title">Why Choose Us</h2>
                        <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

                        <div class="row my-5">
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ asset('images/truck.svg') }}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Fast &amp; Free Shipping</h3>
                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ asset('images/bag.svg') }}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Easy to Shop</h3>
                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ asset('images/support.svg') }}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>24/7 Support</h3>
                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ asset('images/return.svg') }}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Hassle Free Returns</h3>
                                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="img-wrap">
                            <img src="{{ asset('images/why-choose-us-img.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Why Choose Us Section -->

        <!-- Start We Help Section -->
        <div class="we-help-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <div class="imgs-grid">
                            <div class="grid grid-1"><img src="{{ asset('images/img-grid-1.jpg') }}" alt="Untree.co"></div>
                            <div class="grid grid-2"><img src="{{ asset('images/img-grid-2.jpg') }}" alt="Untree.co"></div>
                            <div class="grid grid-3"><img src="{{ asset('images/img-grid-3.jpg') }}" alt="Untree.co"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 ps-lg-5">
                        <h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
                        <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

                        <ul class="list-unstyled custom-list my-4">
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        </ul>
                        <p><a href="#" class="btn">Explore</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End We Help Section -->

        <!-- Start Popular Product -->
        <div class="popular-product">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="product-item-sm d-flex">
                            <div class="thumbnail">
                                <img src="{{ asset('images/product-1.png') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="pt-3">
                                <h3>Nordic Chair</h3>
                                <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="product-item-sm d-flex">
                            <div class="thumbnail">
                                <img src="{{ asset('images/product-2.png') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="pt-3">
                                <h3>Kruzo Aero Chair</h3>
                                <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="product-item-sm d-flex">
                            <div class="thumbnail">
                                <img src="{{ asset('images/product-3.png') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="pt-3">
                                <h3>Ergonomic Chair</h3>
                                <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular Product -->

        <!-- Start Testimonial Slider -->
        <div class="testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center">
                        <h2 class="section-title">Testimonials</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="testimonial-slider-wrap text-center">
                            <div id="testimonial-nav">
                                <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                                <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                            </div>

                            <div class="testimonial-slider">
                                <div class="item">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="testimonial-block text-center">
                                                <blockquote class="mb-5">
                                                    <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                                </blockquote>

                                                <div class="author-info">
                                                    <div class="author-pic">
                                                        <img src="{{ asset('images/person-1.png') }}" alt="Maria Jones" class="img-fluid">
                                                    </div>
                                                    <h3 class="font-weight-bold">Maria Jones</h3>
                                                    <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonial Slider -->

        <!-- Start Blog Section -->
        <div class="blog-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <h2 class="section-title">Recent Blog</h2>
                    </div>
                    <div class="col-md-6 text-start text-md-end">
                        <a href="#" class="more">View All Posts</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="{{ asset('images/post-1.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">First Time Home Owner Ideas</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="{{ asset('images/post-2.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">How To Keep Your Furniture Clean</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="{{ asset('images/post-3.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Section -->

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/tiny-slider.js"></script>
        <script src="js/custom.js"></script>
    </body>

    </html>
@endsection

@push('scripts')
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endpush
