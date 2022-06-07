@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container charity-page">
        <x-banner :banner-title="$bannerTitle"></x-banner>
        <section class="charity py-5">
            <div class="container">
                <form>
                    <div class="row">
                        <label for="donation">Your Donation</label>
                        <div class="col-lg-6">
                            <input type="number" placeholder="$100.00">
                            <input type="number" placeholder="$1,000.00" class="mt-4">
                            <input type="number" placeholder="$5,000.00" class="mt-4">
                        </div>
                        <div class="col-lg-6">
                            <input type="number" placeholder="$500.00">
                            <input type="number" placeholder="$2,000.00" class="mt-4">
                            <input type="number" placeholder="Custom Amount:" class="mt-4">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label for="donation">Details</label>
                        <div class="col-lg-6">
                            <input type="text" placeholder="First Name*">
                            <input type="email" placeholder="Email*" class="mt-4">
                            <input type="text" placeholder="Address 2" class="mt-4">
                            <input type="text" placeholder="State" class="mt-4">
                            <input type="text" placeholder="Country" class="mt-4">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Last Name*">
                            <input type="text" placeholder="Address" class="mt-4">
                            <input type="text" placeholder="City" class="mt-4">
                            <input type="number" placeholder="Postcode" class="mt-4">
                            <input type="number" placeholder="Phone Number" class="mt-4">
                        </div>
                    </div>
                    <div class="links mt-5 text-center">
                        <button type="submit">Donate Now</button>
                    </div>
                </form>
            </div>
        </section>
        <x-footer />
    </div>
@endsection
