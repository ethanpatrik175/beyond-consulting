@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container blog-page checkout">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="blogs section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h3 class="mb-4">Billing Details</h3>
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name">
                        <label for="last-name" class="mt-3">Last Name</label>
                        <input type="text" id="last-name">
                        <label for="email" class="mt-3">Email</label>
                        <input type="text" id="email">
                        <label for="company-name" class="mt-3">Company Name</label>
                        <input type="text" id="company-name">
                        <label for="address" class="mt-3">Street Address</label>
                        <input type="text" id="address">
                        <input type="text" class="mt-3" id="address">
                        <label for="city" class="mt-3">Town/City</label>
                        <input type="text" id="city">
                        <label for="city" class="mt-3">State</label>
                        <select>
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                            <option>State</option>
                        </select>
                        <label for="zip" class="mt-3">Zip</label>
                        <input type="number" id="zip">
                        <label for="phone" class="mt-3">Phone Number</label>
                        <input type="number" id="phone">
                        <label for="notes" class="mt-3">Order Notes?</label>
                        <textarea></textarea>
                    </div>
                    <div class="col-lg-5">
                        <div class="order-box">
                            <div class="box-upper">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6>Product</h6>
                                    </div>
                                    <div class="col-lg-8">
                                        <h6>Total</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="box-upper-mid">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6> Lorem ipsm x 1</h6>
                                    </div>
                                    <div class="col-lg-8">
                                        <h6>$20.52</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="box-lower-mid">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6>Subtotal</h6>
                                    </div>
                                    <div class="col-lg-8">
                                        <h6>$20.52</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="box-lower-end">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6>Shipping</h6>
                                    </div>
                                    <div class="col-lg-8">
                                        <h6>Enter Shipping Address to view your shipping address.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="box-end">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit explicabo
                                            laborum hic!Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit
                                            explicabo laborum hic!</p>
                                        <div class="links">
                                            <button>Place Order</button>
                                        </div>
                                    </div>
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
