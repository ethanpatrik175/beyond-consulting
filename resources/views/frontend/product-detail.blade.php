@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container travel-detail-page single-product">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="travel-details section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-lg-center">
                        <div class="section-heading">
                            <h1 class="text-white">Product Details</h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="img-div">
                            <img src="{{ asset('assets/frontend/images/beyond-10.jpg') }}">
                        </div>
                        <div class="row mt-4 justify-content-between">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="col-lg-2">
                                    <div class="img-div">
                                        <img src="{{ asset('assets/frontend/images/beyond-10.jpg') }}">
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="desc-box mt-4">
                            <h4>Description:</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quaerat facere dolorum
                                possimus ipsum doloremque tempora at inventore quam suscipit.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quaerat facere dolorum
                                possimus ipsum doloremque tempora at inventore quam suscipit.</p>
                        </div>
                        <div class="similar-prod mt-4">
                            <h4>Similar Products</h4>
                        </div>
                        <div class="owl-carousel prod-carousel owl-theme">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="item">
                                    <div class="img-div">
                                        <img src="{{ asset('assets/frontend/images/beyond-10.jpg') }}">
                                    </div>
                                    <p>Lorem ipsum dolor sit amet cossectetur...</p>
                                    <h6>USD 8.88 <span>10.00(2% Off)</span></h6>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product">
                            <div class="product-details">
                                <h4 class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit....</h4>
                                <p>Featured Product</p>
                            </div>
                            <div class="prod-pricing d-lg-flex">
                                <h4>USD 12.80 <span>USD 31.99 (60% Off)</span></h4>
                            </div>
                            <div class="links mt-2">
                                <button>Add To Cart</button>
                            </div>
                            <div class="prod-desc mt-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, eligendi. Illum beatae
                                    ducimus accusamus eius, enim cupiditate sint ex laboriosam?</p>
                                <textarea class="mt-3"></textarea>
                            </div>
                            <div class="privacy-policy mt-4">
                                <h4>Privacy Policy:</h4>
                                <p class="mt-3"> <i class="fa-solid fa-building-shield"></i> Lorem ipsum dolor sit
                                    amet consectetur, adipisicing elit. Sint eos porro reiciendis rerum natus officia?</p>
                                <p class="mt-3"> <i class="fa-solid fa-building-shield"></i> Lorem ipsum dolor sit
                                    amet consectetur, adipisicing elit. Sint eos porro reiciendis rerum natus officia?</p>
                                <p class="mt-3"> <i class="fa-solid fa-building-shield"></i> Lorem ipsum dolor sit
                                    amet consectetur, adipisicing elit. Sint eos porro reiciendis rerum natus officia?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
@endsection

@push('scripts')
    <script>
        $('.prod-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endpush
