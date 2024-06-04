@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Pricing Plan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Price Plan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.plans.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Label</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'label') }}" id="label" name="label" value="{{ old('label') }}">
                                            <x-input-error :messages="$errors->get('label')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Price</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'price') }}" id="price" name="price" value="{{ old('price') }}">
                                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Job Limit</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'job_limit') }}" id="job_limit" name="job_limit" value="{{ old('job_limit') }}">
                                            <x-input-error :messages="$errors->get('job_limit')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Featured Job Limit</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'featured_job_limit') }}" id="featured_job_limit" name="featured_job_limit" value="{{ old('featured_job_limit') }}">
                                            <x-input-error :messages="$errors->get('featured_job_limit')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Highlight Job Limit</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'highlight_job_limit') }}" id="highlight_job_limit" name="highlight_job_limit" value="{{ old('highlight_job_limit') }}">
                                            <x-input-error :messages="$errors->get('highlight_job_limit')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Recommended</label>
                                            <select name="recommended" class="form-control {{ hasError($errors, 'recommended') }}" id="">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('recommended')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Profile Verified</label>
                                            <select name="profile_verified" class="form-control {{ hasError($errors, 'profile_verified') }}" id="">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('profile_verified')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Show this in the frontend</label>
                                            <select name="frontend_show" class="form-control {{ hasError($errors, 'frontend_show') }}" id="">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('frontend_show')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Show this in the home page</label>
                                            <select name="show_at_home" class="form-control {{ hasError($errors, 'show_at_home') }}" id="">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('show_at_home')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
