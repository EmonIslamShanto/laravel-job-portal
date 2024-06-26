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
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('company.jobs.store') }}" method="POST">
                                @csrf
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Job Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Title <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'title') }}" id="title"
                                                        name="title" value="{{ old('title') }}"
                                                        placeholder="Enter the title of the job">
                                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group select-style">
                                                    <label for="name">Job Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'category') }}"
                                                        id="">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Total Vacancies <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'vacancies') }}"
                                                        id="vacancies" name="vacancies" value="{{ old('vacancies') }}"
                                                        placeholder="Enter the total vacancies">
                                                    <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Deadline <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control datepicker {{ hasError($errors, 'deadline') }}"
                                                        id="deadline" name="deadline" value="{{ old('deadline') }}">
                                                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Job Location</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label for="name">Country <span class="text-danger">*</span></label>
                                                    <select name="country"
                                                        class="form-control form-icons select-active country {{ hasError($errors, 'country') }}"
                                                        id="">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label for="name">State <span class="text-danger">*</span></label>
                                                    <select name="state"
                                                        class="form-control form-icons select-active state {{ hasError($errors, 'state') }}"
                                                        id="">
                                                        <option value="">Select State</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label for="name">City <span class="text-danger">*</span></label>
                                                    <select name="city"
                                                        class="form-control form-icons select-active city {{ hasError($errors, 'city') }}"
                                                        id="">
                                                        <option value="">Select City</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Address <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'address') }}"
                                                        id="address" name="address" value="{{ old('address') }}"
                                                        placeholder="Enter the job address">
                                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Salary Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group d-flex">
                                                            <input  style="height: 18px; width: 18px" type="radio"
                                                                class=" {{ hasError($errors, 'salary_mode') }}"
                                                                id="salary_range" name="salary_mode" checked value="range">
                                                            <label style="margin-left: 5px; margin-top: -4px" for="salary_range">Salary Range</label>
                                                            <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group d-flex">
                                                            <input  style="height: 18px; width: 18px" type="radio"
                                                                class=" {{ hasError($errors, 'salary_mode') }}"
                                                                id="custom_salary" name="salary_mode" value="custom">
                                                            <label style="margin-left: 5px; margin-top: -4px" for="custom_salary">Custom Salary</label>
                                                            <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 salary_range_part">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Minimum Salary <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control {{ hasError($errors, 'min_salary') }}"
                                                                id="min_salary" name="min_salary"
                                                                value="{{ old('min_salary') }}"
                                                                placeholder="Enter the minimum salary">
                                                            <x-input-error :messages="$errors->get('min_salary')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Maximum Salary <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control {{ hasError($errors, 'max_salary') }}"
                                                                id="max_salary" name="max_salary"
                                                                value="{{ old('max_salary') }}"
                                                                placeholder="Enter the maximum salary">
                                                            <x-input-error :messages="$errors->get('max_salary')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 custom_salary_part">
                                                <div class="form-group">
                                                    <label for="name">Custom Salary <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                        id="custom_salary" name="custom_salary"
                                                        value="{{ old('custom_salary') }}"
                                                        placeholder="Enter the custom salary">
                                                    <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group select-style">
                                                    <label for="name">Salary Type <span
                                                            class="text-danger">*</span></label>
                                                    <select name="salary_type"
                                                        class="form-control  form-icons select-active {{ hasError($errors, 'salary_type') }}"
                                                        id="">
                                                        <option value="">Select Salary Type</option>
                                                        @foreach ($salaryTypes as $salaryType)
                                                            <option value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Job Attributes</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group select-style">
                                                    <label for="name">Experience <span
                                                            class="text-danger">*</span></label>
                                                    <select name="experience"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'experience') }}"
                                                        id="">
                                                        <option value="">Select Experience</option>
                                                        @foreach ($experiences as $experience)
                                                            <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group select-style">
                                                    <label for="name">Job Role <span
                                                            class="text-danger">*</span></label>
                                                    <select name="job_role"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'job_role') }}"
                                                        id="">
                                                        <option value="">Select Job Role</option>
                                                        @foreach ($jobRoles as $jobRole)
                                                            <option value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group select-style">
                                                    <label for="name">Education <span
                                                            class="text-danger">*</span></label>
                                                    <select name="education"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'education') }}"
                                                        id="">
                                                        <option value="">Select Education</option>
                                                        @foreach ($educations as $education)
                                                            <option value="{{ $education->id }}">{{ $education->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group select-style">
                                                    <label for="name">Job Type <span
                                                            class="text-danger">*</span></label>
                                                    <select name="job_type"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'job_type') }}"
                                                        id="">
                                                        <option value="">Select Job Type</option>
                                                        @foreach ($jobTypes as $jobType)
                                                            <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group select-style">
                                                    <label for="name">Tags <span class="text-danger">*</span></label>
                                                    <select name="tags[]" multiple
                                                        class="form-control form-icons select-active {{ hasError($errors, 'tags') }}"
                                                        id="">
                                                        <option value="">Select Tags</option>
                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Benefits <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                        id="benefits" multiple name="benefits" value="{{ old('benefits') }}"
                                                        placeholder="Enter the job benefits">
                                                    <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group select-style">
                                                    <label for="name">Skills <span
                                                            class="text-danger">*</span></label>
                                                    <select name="skills[]" multiple
                                                        class="form-control form-icons select-active {{ hasError($errors, 'skills') }}"
                                                        id="">
                                                        <option value="">Select Skill</option>
                                                        @foreach ($skills as $skill)
                                                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Application Options</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group select-style">
                                                    <label for="name">Receive Applications <span
                                                            class="text-danger">*</span></label>
                                                    <select name="receive_application"
                                                        class="form-control form-icons select-active {{ hasError($errors, 'receive_application') }}"
                                                        id="">
                                                        <option value="">Select Any One</option>
                                                        <option value="app">On Our Platform</option>
                                                        <option value="email">On Our Email Address</option>
                                                        <option value="custom_url">On Our Custom Link</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('receive_application')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Promote</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group d-flex">
                                                            <input style="height: 18px; width: 18px" type="checkbox"
                                                                class=" {{ hasError($errors, 'featured') }}"
                                                                id="featured" name="featured" value="1">
                                                            <label style="margin-left: 5px; margin-top: -4px" for="featured">Featured</label>
                                                            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="form-group d-flex">
                                                            <input style="height: 18px; width: 18px" type="checkbox"
                                                                class=" {{ hasError($errors, 'highlight') }}"
                                                                id="highlight" name="highlight" value="1">
                                                            <label style="margin-left: 5px; margin-top: -4px" for="highlight">Highlight</label>
                                                            <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Job Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Description <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control {{ hasError($errors, 'description') }}" style="height: 200px" name="description"
                                                        id="editor"></textarea>
                                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                                </div>
                                            </div>
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

@push('scripts')
    <script>
        $(".inputtags").tagsinput('items');
        $(document).ready(function() {

            $('.salary_range_part').hide();
            $('.custom_salary_part').hide();

            $('input[name="salary_mode"]').on('change', function() {
                if ($(this).attr('id') == 'salary_range') {
                    $('.salary_range_part').show();
                    $('.custom_salary_part').hide();
                } else {
                    $('.salary_range_part').hide();
                    $('.custom_salary_part').show();
                }
            });

            $('.country').on('change', function() {
                let country_id = $(this).val();

                $('.city').html('');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, state) {
                            html +=
                            `<option value="${state.id}">${state.name}</option>`;
                        });

                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })

            $('.state').on('change', function() {
                let state_id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, city) {
                            html += `<option value="${city.id}">${city.name}</option>`;
                        });

                        $('.city').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        });
    </script>
@endpush
