@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Pricing</h1>
            <div class="section-header-breadcrumb">
                <a class="btn btn-primary" href="{{ route('admin.plans.create') }}"><i class="fas fa-plus-square"></i> Create
                    New Price Plan</a>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pricing</h2>
            <p class="section-lead">Price components are very important for SaaS projects or other projects.</p>

            <div class="row">
                @forelse ($plans as $plan)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing pricing-highlight">
                            @if ($plan->recommended)
                                <div class="pricing-title">
                                    Recommended
                                </div>
                            @endif
                            <div class="pricing-padding">
                                <div>
                                    @if ($plan->frontend_show)
                                        <span class="badge bg-primary text-light">Showing at frontend</span>
                                    @endif
                                    @if ($plan->show_at_home)
                                        <span class="badge bg-success text-dark">Showing at home</span>
                                    @endif
                                </div>
                                <div>
                                    <h4>{{ $plan->label }}</h4>
                                </div>
                                <div class="pricing-price">
                                    <div>${{ $plan->price }}</div>
                                    <div>per month</div>
                                </div>
                                <div class="pricing-details">
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $plan->job_limit }} Job Post Limit</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $plan->featured_job_limit }} Featured Job Limit
                                        </div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $plan->highlight_job_limit }} Highlight Job Limit
                                        </div>
                                    </div>
                                    <div class="pricing-item">
                                        @if ($plan->profile_verified)
                                            <div class="pricing-item-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        @else
                                            <div class="pricing-item-icon bg-danger">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        @endif
                                            <div class="pricing-item-label">Verifed Company</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-cta d-flex  justify-content-between w-100">
                                <a href="{{ route('admin.plans.destroy', $plan->id) }}" class="w-80 p-2 m-3 bg-danger delete-item"><i class="fas fa-times"></i> Delete</a>
                                <a href="{{ route('admin.plans.edit', $plan->id) }}" class="w-80 p-2 m-3 bg-success">Edit <i class="fas fa-arrow-right"></i></a>
                            </div>
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
    </section>
@endsection
