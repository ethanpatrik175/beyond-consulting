@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container prod-promotion-page">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="prod-promotion py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="single-detail-filter-area">
                            <form method='GET' action='/product-promotion' id='myform'>
                                <select name="category" id="category" onchange='submitForm();'>
                                    <option value="" selected hidden>Select Category</option>
                                    @foreach ($product_category as $repo)
                                        <option value="{{ $repo->id }}">{{ $repo->title }}</option>
                                    @endforeach
                                </select>
                            </form>
                            <div class="multi-range-detail">
                                <span>Price</span>
                                <span>
                                    $<span id="lower1-val">0</span> - $<span id="upper1-val">300000</span>
                                </span>
                            </div>
                            <div class="multi-range">
                                <input type="range" min="0" max="300000" value="0" id="lower1"
                                    name="min_price">
                                <input type="range" min="0" max="300000" value="300000" id="upper1"
                                    name="max_price">
                            </div>
                            <div class="links mt-4">
                                <button>
                                    <a href="#">Filter</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            @forelse($Category_wise_product as $repo)
                                <div class="col-lg-3">
                                    <div class="prod-card">
                                        <div class="prod-upper">
                                            <div class="img-div">
                                                <a href="{{ route('front.product.detail', ['id' => $repo->id]) }}">
                                                    <img src="{{ asset('assets/frontend/images/products/' . $repo->icon) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="prod-lower">
                                            <div class="prod-desc">

                                                <p>{{ $repo->title }}</p>
                                                <h3><a
                                                        href="{{ route('front.product.detail', ['id' => $repo->id]) }}">{{ $repo->slug }}</a>

                                                    <!-- <p>Lorem ipsum dolor sit</p>
                                            <h3><a href="{{ route('front.product.detail', 'test-product') }}">Green
                                                    T-Shirt</a>
                                            </h3> -->
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
                                            <h6 class="text-white m-0">$ &nbsp;&nbsp;{{ $repo->regular_price }}</h6>
                                            <a href="{{ route('front.cart.store', ['id' => $repo->id]) }}"><i
                                                    class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No Products Found</p>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <x-footer />
    </div>
@endsection

@push('scripts')
    <script src="js/jquery-3.6.0.min.js"></script>

    <script>
        var lowerSlider1 = document.querySelector('#lower1'),
            upperSlider1 = document.querySelector('#upper1'),
            lowerVal1 = parseInt(lowerSlider1.value);
        upperVal1 = parseInt(upperSlider1.value);

        upperSlider1.oninput = function() {
            lowerVal1 = parseInt(lowerSlider1.value);
            upperVal1 = parseInt(upperSlider1.value);

            if (upperVal1 < lowerVal1 + 4) {
                lowerSlider1.value = upperVal1 - 4;

                if (lowerVal1 == lowerSlider1.min) {
                    upperSlider1.value = 4;
                }
            }
        };


        lowerSlider1.oninput = function() {
            lowerVal1 = parseInt(lowerSlider1.value);
            upperVal1 = parseInt(upperSlider1.value);

            if (lowerVal1 > upperVal1 - 4) {
                upperSlider1.value = lowerVal1 + 4;

                if (upperVal1 == upperSlider1.max) {
                    lowerSlider1.value = parseInt(upperSlider1.max) - 4;
                }

            }
        };

        $("#lower1,#upper1").on('change', function() {

            $("#lower1-val").html(lowerVal1);
            $("#upper1-val").html(upperVal1);
        });

        function submitForm() {
            document.getElementById('myform').submit();
        }
    </script>
@endpush
