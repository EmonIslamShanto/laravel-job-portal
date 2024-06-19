@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Jobs</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Jobs</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.jobs.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" style="height: 40px" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.jobs.create') }}"><i
                                    class="fas fa-plus-square"></i> Create New Job</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Job</th>
                                        <th>Category/Role</th>
                                        <th>Salary</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                    @forelse ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="mr-2">
                                                        <img style="width: 45px; height: 45px; object-fit:cover" src="{{ asset($job?->company?->logo) }}" alt="">
                                                    </div>
                                                    <div>
                                                        <b>{{ $job?->title }}</b>
                                                        <br>
                                                        <small>{{ $job?->company?->name }} - {{ $job?->jobType?->name }}</small>
                                                    </div>
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
                                                    <b>{{ $job->min_salary }} {{ config('settings.site_default_currency') }} - {{ $job->max_salary }} {{ config('settings.site_default_currency') }}</b>
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
                                                @if ($job->deadline > date('Y-m-d'))
                                                    <span class="badge badge-primary">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Expired</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="{{ route('admin.jobs.destroy', $job->id) }}" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i>
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
