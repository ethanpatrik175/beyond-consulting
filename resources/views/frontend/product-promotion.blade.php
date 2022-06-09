@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container prod-promotion-page">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="prod-promotion py-5">
            <div class="container">

                @for ($i = 1; $i <= 2; $i++)
                    <div class="row mb-5">
                        <div class="col-lg-3">
                            <div class="prod-card">
                                <div class="prod-upper">
                                    <div class="img-div">
                                        <a href="{{ route('front.product.detail', 'test-product') }}">
                                            <img src="{{ asset('assets/frontend/images/gated-tshirt-green-front.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="prod-lower">
                                    <div class="prod-desc">
                                        <p>Lorem ipsum dolor sit</p>
                                        <h3><a href="{{ route('front.product.detail', 'test-product') }}">Green
                                                T-Shirt</a>
                                        </h3>
                                        <div class="stars d-flex">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="prod-pricing position-relative d-flex align-item-center">
                                    <h6 class="text-white m-0">$7.49 - $986.24</h6>
                                    <a href="#"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4 mt-lg-0">
                            <div class="prod-card">
                                <div class="prod-upper">
                                    <div class="img-div">
                                        <a href="{{ route('front.product.detail', 'test-product') }}">
                                            <img src="{{ asset('assets/frontend/images/gear003-main-gear-t-shirt.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="prod-lower">
                                    <div class="prod-desc">
                                        <p>Lorem ipsum dolor sit</p>
                                        <h3><a href="{{ route('front.product.detail', 'test-product') }}">Black
                                                T-Shirt</a>
                                            <div class="stars d-flex">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                    </div>
                                </div>
                                <div class="prod-pricing position-relative d-flex align-item-center">
                                    <h6 class="text-white m-0">$7.49 - $986.24</h6>
                                    <a href="#"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4 mt-lg-0">
                            <div class="prod-card">
                                <div class="prod-upper">
                                    <div class="img-div">
                                        <a href="{{ route('front.product.detail', 'test-product') }}">
                                            <img src="{{ asset('assets/frontend/images/tshirt.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="prod-lower">
                                    <div class="prod-desc">
                                        <p>Lorem ipsum dolor sit</p>
                                        <h3><a href="{{ route('front.product.detail', 'test-product') }}">Yellow
                                                T-Shirt</a>
                                            <div class="stars d-flex">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                    </div>
                                </div>
                                <div class="prod-pricing position-relative d-flex align-item-center">
                                    <h6 class="text-white m-0">$7.49 - $986.24</h6>
                                    <a href="#"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4 mt-lg-0">
                            <div class="prod-card">
                                <div class="prod-upper">
                                    <div class="img-div">
                                        <img src="{{ asset('assets/frontend/images/Safety_Pink_Short_Sleeve_T_Shirt_Front__12433 1.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="prod-lower">
                                    <div class="prod-desc">
                                        <p>Lorem ipsum dolor sit</p>
                                        <h3><a href="{{ route('front.product.detail', 'test-product') }}">Pink
                                                T-Shirt</a>
                                            <div class="stars d-flex">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                    </div>
                                </div>
                                <div class="prod-pricing position-relative d-flex align-item-center">
                                    <h6 class="text-white m-0">$7.49 - $986.24</h6>
                                    <a href="#"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </section>
        <x-footer />
    </div>
@endsection
