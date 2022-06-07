@extends('layouts.frontend.master')

@section('title')
    {{ 'Register' }}
@endsection

@section('content')
    <div class="main-container volunteer-signup-page">
        <x-mobile-view-slide />
        <x-banner banner-title="Volunteer Sign Up" />
        <section class="volunteer-signup py-lg-5">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="first-name">First Name</label>
                            <input type="text" placeholder="Type Here..." name="first-name" id="first-name">

                            <label for="last-name" class="mt-4">Last Name</label>
                            <input type="text" placeholder="Type Here..." name="last-name" id="last-name">

                            <label for="email" class="mt-4">Email</label>
                            <input type="email" placeholder="Type Here..." name="email" id="email">

                            <label for="password" class="mt-4">Password</label>
                            <input type="password" placeholder="Type Here..." name="password" id="password">

                            <label for="password" class="mt-4">Confirm Password</label>
                            <input type="password" placeholder="Type Here..." name="password" id="password">

                            <div class="terms mt-3">
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">Agree Terms & Conditions</label>
                            </div>
                        </div>

                    </div>
                    <div class="links mt-4 text-center">
                        <button type="submit" class="red-button">Sign Up Now</button>
                    </div>
                </form>
            </div>
        </section>
        <x-footer />
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/backend/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/form-validation.init.js') }}"></script>
@endpush
