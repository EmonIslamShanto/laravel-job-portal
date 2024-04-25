@extends('front-end.layouts.master')

@section('contents')
<div class="bg-homepage1"></div>

{{-- Hero Section --}}
@include('front-end.home.sections.hero-section')

<div class="mt-100"></div>

{{-- Category Section --}}
@include('front-end.home.sections.category-section')

{{-- Featured Job Section --}}
@include('front-end.home.sections.featured-job-section')

{{-- Why choose us Section --}}
@include('front-end.home.sections.why-choose-us-section')

{{-- Learn More Section --}}
@include('front-end.home.sections.learn-more-section')

{{-- Counter Section --}}
@include('front-end.home.sections.counter-section')

{{-- Top Recruiter Section --}}
@include('front-end.home.sections.top-recruiters-section')

{{-- Price Plan Section --}}
@include('front-end.home.sections.price-plan-section')

{{-- Job By Locations Section --}}
@include('front-end.home.sections.job-by-locations-section')

{{-- Review Section --}}
@include('front-end.home.sections.review-section')

{{-- Blog Section --}}
@include('front-end.home.sections.blog-section')

@endsection
