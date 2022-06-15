@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container contact-page">
    <x-banner :banner-title="$bannerTitle"></x-banner>
       
        <section class="contact-us section-padding add-to-cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-div">
                            <img src="/assets/frontend/images/beyond-14.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="add-prod-details">
                            <h3>Lorem Ipsum Dolor Sit</h3>
                            <p>$80.80</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed </li>
                            </ul>
                            <div class="prod-option d-flex align-items-center">
                                <label for="option">Color: </label>
                                <select id="option">
                                    <option selected>Choose An Option</option>
                                    <option>Blue</option>
                                    <option>Red</option>
                                    <option>Green</option>
                                    <option>Orange</option>
                                </select>
                            </div>
                            <div class="links d-flex mt-3">
                               <button>
                                    <a href="#">Add To Cart</a>
                                </button>
                                <input type="number" value="1">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
    @endsection