@extends('front-end.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Job Post</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Job Post</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('front-end.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="card pl-2">
                        <div class="card-header">
                            <h4>All Jobs</h4>
                            <div class="row my-2" style="justify-content: space-between">
                                <div class="card-header-form col-md-9">
                                    <form action="{{ route('company.jobs.index') }}" method="GET">
                                        <div class="input-group d-flex">
                                            <input type="text" class="form-control"
                                                placeholder="Search" name="search" value="{{ request('search') }}">
                                            <div class="input-group-btn">
                                                <button type="submit" style="height: 50px" class="btn btn-primary"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <a class="btn btn-primary col-md-3" style="height: 50px; width:auto; margin-right: 10px
                                " href="{{ route('company.jobs.create') }}"><i
                                        class="fas fa-plus-square"></i> Create New Job</a>
                            </div>
                        </div>
                        <div class="card-body mt-2 p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Job</th>
                                        <th>Category/Role</th>
                                        <th>Salary</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th style="width: 25%; text-align:center">Action</th>
                                    </tr>
                                    @forelse ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div>
                                                    <b>{{ $job?->title }}</b>
                                                    <br>
                                                    <small>{{ $job?->company?->name }} -
                                                        {{ $job?->jobType?->name }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <b>{{ $job?->category?->name }}</b>
                                                    <br>
                                                    <small>{{ $job?->jobRole?->name }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($job->salary_mode === 'range')
                                                    <b>{{ $job->min_salary }}
                                                        {{ config('settings.site_default_currency') }} -
                                                        {{ $job->max_salary }}
                                                        {{ config('settings.site_default_currency') }}</b>
                                                    <br>
                                                    <small>{{ $job?->salaryType?->name }}</small>
                                                @else
                                                    <b>{{ $job->custom_salary }}</b>
                                                    <br>
                                                    <small>{{ $job?->salaryType?->name }}</small>
                                                @endif
                                            </td>
                                            <td>{{ formatDate($job->deadline) }}</td>
                                            <td>
                                                @if ($job->status === 'pending')
                                                    <span class="badge text-dark p-2" style="color: white;background-color: yellow;">Pending</span>
                                                @elseif ($job->deadline > date('Y-m-d'))
                                                    <span class="badge text-dark p-2"
                                                        style="color: white;background-color: green;">Active</span>
                                                @else
                                                    <span class="badge text-dark p-2"
                                                        style="color: white;background-color: red;">Expired</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('company.jobs.edit', $job->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="{{ route('company.jobs.destroy', $job->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($jobs->hasPages())
                                    {{ $jobs->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
