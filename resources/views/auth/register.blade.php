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
                <form method="POST" action="{{ route('register') }}" class="needs-validation custom-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" data-parsley-required-message="" placeholder="First Name" required
                                    autofocus />
                                <div class="invalid-feedback">
                                    Please enter your first name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name" />
                                <div class="invalid-feedback">
                                    Please enter your last name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" required/>
                                <div class="invalid-feedback">
                                    Please enter your email
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" required />
                                <div class="invalid-feedback">
                                    Please enter password.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    placeholder="Confirm Password" data-parsley-equalto="#password" data-parsley-trigger="keyup" required />
                                <div class="invalid-feedback">
                                    Please retype password to confirm.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="terms mt-3">
                                <input type="checkbox" name="agree" id="agree" />
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
