@extends('front-end.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Pricing Plans</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Pricing Plans</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="container">
            <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Pricing Table</h2>
            <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">Choose The Best
                Plan That&rsquo;s For You</div>
            <div class="max-width-price">
                <div class="block-pricing mt-70">
                    <div class="row">
                        @forelse ($plans as $plan)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp">

                            <div class="box-pricing-item">
                                <div>
                                    @if ($plan->recommended)
                                        <span class="badge mb-2 p-2  bg-success text-light">Recommended</span>
                                    @endif
                                </div>
                                <h3>{{ $plan->label }}</h3>
                                <div class="box-info-price"><span
                                        class="text-price color-brand-2">${{ $plan->price }}</span><span
                                        class="text-month">/month</span></div>
                                <ul class="list-package-feature">
                                    <li>{{ $plan->job_limit }} Job Post Limit</li>
                                    <li>{{ $plan->featured_job_limit }} Featured Job Limit</li>
                                    <li>{{ $plan->highlight_job_limit }} Highlight Job Limit</li>
                                    <li>
                                        @if ($plan->profile_verified)
                                            <p>Verifed Company</p>
                                        @else
                                            <del>Verifed Company</del>
                                        @endif
                                    </li>
                                </ul>
                                <div><a class="btn btn-border" href="{{ route('checkout.index', $plan->id) }}">Choose plan</a></div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <p>No pricing plan found.</p>
                            </div>
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
