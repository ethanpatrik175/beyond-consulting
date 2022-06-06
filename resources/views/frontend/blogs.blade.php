@extends('layouts.frontend.master')

@section('title') {{ __($pageTitle) }} @endsection

@section('content')
<div class="main-container blog-page">
    <x-banner :banner-title="$bannerTitle"></x-banner>
    <x-latest-blogs />
    <x-testimonial />
    <x-footer />
</div>
@endsection