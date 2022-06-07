@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container single-blog-page">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="section-padding blog-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h5>COMMUNITY</h5>
                            <h1 class="text-white">Your Wellness Expert On Social Media - Why Is Online Grooming A Hot
                                Trend?</h1>
                            <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto rerum sapiente maxime
                                magni"</p>
                        </div>
                        <div class="img-div text-center mt-4">
                            <img src="{{asset('assets/frontend/images/Rectangle_686.png')}}">
                        </div>
                        <div class="paras mt-4">
                            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ab, quos velit est omnis
                                voluptate odit mollitia fugiat illum? Delectus illum temporibus aspernatur id tempore
                                quaerat quibusdam deleniti ea consectetur! Optio qui odit quas quibusdam, natus doloremque
                                et id a consequatur, blanditiis itaque commodi voluptas mollitia vero omnis aliquid suscipit
                                qui odit quas quibusdam, natus doloremque et id a consequatur.</p>
                            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ab, quos velit est omnis
                                voluptate odit mollitia fugiat illum? Delectus illum temporibus aspernatur id tempore
                                quaerat quibusdam deleniti ea consectetur! Optio qui odit quas quibusdam, natus doloremque
                                et id a consequatur, blanditiis itaque commodi voluptas mollitia vero omnis aliquid suscipit
                                qui odit quas quibusdam, natus doloremque et id a consequatur.</p>
                        </div>
                        <div class="user-response mt-4">
                            <h4>Add Your Response</h4>
                            <form class="mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name*">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email*">
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <textarea rows="6" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="comments user-response mt-4">
                            <h4>Comments</h4>
                            <div class="row align-items-center mt-4">
                                <div class="col-lg-2">
                                    <div class="img-div">
                                        <img src="{{asset('assets/frontend/images/Mask-2.png')}}">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="comment-details">
                                        <h6>John Doe</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation</p>
                                    </div>
                                    <div class="blog-reactions d-flex mt-2">
                                        <div>
                                            <p> <i class="fa-solid fa-thumbs-up"></i> 211</p>
                                        </div>
                                        <div>
                                            <p> <i class="fa-solid fa-comment"></i> Reply</p>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="reply-box position-relative">
                                            <input type="text" placeholder="Write Your Reply">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
@endsection
