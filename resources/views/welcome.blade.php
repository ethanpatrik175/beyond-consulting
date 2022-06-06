@extends('layouts.frontend.master')

@section('content')
    <div class="main-container">
        <x-mobile-view-slide />
        <x-home-banner />

        <section class="how-it-work position-relative section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h5>How it work</h5>
                            <h1 class="text-white">About Our Platform System</h1>
                            <p class="mt-lg-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
                                ab, quos velit est omnis voluptate odit mollitia fugiat illum? Delectus illum temporibus
                                aspernatur id tempore quaerat quibusdam deleniti ea consectetur! Optio
                                qui odit quas quibusdam, natus doloremque et id a consequatur, blanditiis itaque commodi
                                voluptas mollitia vero omnis aliquid suscipit.</p>
                        </div>
                        <div class="links mt-4">
                            <button><a href="#">Find Your Date</a></button>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mt-4 mt-lg-0">
                            <div class="col-lg-7 offset-lg-5">
                                <div class="work-box text-center">
                                    <img src="{{ asset('assets/frontend/images/Profile.svg') }}" alt="">
                                    <h6 class="mt-3">Set Up Your Profiles</h6>
                                    <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Odio esse necessitatibu. Odio esse necessitatibu.</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="work-box text-center">
                                    <img src="{{ asset('assets/frontend/images/Map.svg') }}" alt="">
                                    <h6 class="mt-3 text-white">Get Connect With Others</h6>
                                    <p class="mt-2 text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Odio esse necessitatibu. Odio esse necessitatibu.</p>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-4">
                                <div class="work-box text-center">
                                    <img src="{{ asset('assets/frontend/images/Love.svg') }}" alt="">
                                    <h6 class="mt-3 text-white">Let's Start Dating</h6>
                                    <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Odio esse necessitatibu. Odio esse necessitatibu.</p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="why-choose-us">
            <div class="container-fluid">
                <div class="row align-items-end">
                    <div class="col-lg-6 ps-lg-0">
                        <div class="img-div">
                            <img src="{{ asset('assets/frontend/images/Group_54.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4 mt-lg-0">
                        <div class="section-heading">
                            <h5>How it work</h5>
                            <h1 class="text-white">Our Advantages In Dating Platform</h1>
                        </div>
                        <div class="features mt-4">
                            <div class="feature-box d-flex">
                                <span>01</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium nulla minus ab
                                    esse minima, voluptas recusandae animi temporibus commodi laudantium?</p>
                            </div>
                            <div class="feature-box d-flex mt-2">
                                <span>02</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium nulla minus ab
                                    esse minima, voluptas recusandae animi temporibus commodi laudantium?</p>
                            </div>
                            <div class="feature-box d-flex mt-2">
                                <span>03</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium nulla minus ab
                                    esse minima, voluptas recusandae animi temporibus commodi laudantium?</p>
                            </div>
                        </div>
                        <div class="links mt-3 mt-md-4">
                            <button><a href="#">Learn More</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-testimonial />
        <x-footer />

    </div>
@endsection
