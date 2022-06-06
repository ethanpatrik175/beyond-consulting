@extends('layouts.frontend.master')

@section('page_title') {{ "Login" }} @endsection

@section('content')
<!-- banner start -->
<section class="inner_banner">
    <img src="assets/frontend/images/inner_banner.png" alt="INNER BANNER" class="img-responsive">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="inner_bnr_txt">
                    <div class="text-end">
                        <h4 class="bnr_grad_txt upper ani seven"><span class="txt_brwn">A</span><span
                                class="txt_brwn">w</span><span class="txt_brwn">a</span><span
                                class="txt_brwn">k</span><span class="txt_brwn">e</span><span class="txt_brwn">n</span>
                            <span class="txt_brwn">D</span><span class="txt_brwn">i</span><span
                                class="txt_brwn">v</span><span class="txt_brwn">i</span><span
                                class="txt_brwn">n</span><span class="txt_brwn">e</span>
                            <span>j</span><span>o</span><span>u</span><span>r</span><span>n</span><span>e</span><span>y</span>
                        </h4>
                    </div>
                    <h2>LOGIN</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- ACCOUNT SEC STRT -->
<section class="log-in-page-main">
    <div class="container">
        <div class="row">
            @if (Session::has('message'))
                <div class="col-sm-12 text-center">
                    <ul>
                        <li class="text-{{ Session::get('type') }}">{{ __(Session::get('message')) }}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-sm-12 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.4s">
                <h2>login</h2>
                <div class="log-in-wrap">
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <input type="email" placeholder="{{ __('E-Mail Address *') }}"
                                    class="mb-0 form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                <div class="invalid-feedback mb-1">
                                    Please enter valid email address.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" placeholder="{{ __('Password *') }}"
                                    class="mb-0 form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" />
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                            </div>
                            <div class="forgot-pass">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn_normal">LOGIN</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>
<!-- ACCOUNT SEC END -->
@endsection

@section('scripts')
<script src="{{ asset('assets/backend/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/form-validation.init.js') }}"></script>
@endsection
