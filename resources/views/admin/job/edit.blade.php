@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Update Job Post</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.jobs.update', $job?->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Job Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Title <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'title') }}" id="title"
                                                        name="title" value="{{ old('title', $job?->title) }}"
                                                        placeholder="Enter the title of the job">
                                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Company Name <span
                                                            class="text-danger">*</span></label>
                                                    <select name="company"
                                                        class="form-control select2 {{ hasError($errors, 'company') }}"
                                                        id="">
                                                        <option value="">Select Company</option>
                                                        @foreach ($companies as $company)
                                                            <option @selected($company?->id === $job?->company_id) value="{{ $company->id }}">{{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Job Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category"
                                                        class="form-control select2 {{ hasError($errors, 'category') }}"
                                                        id="">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option @selected($category?->id === $job?->job_category_id) value="{{ $category->id }}">{{ $category->name }}
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
                                                        id="vacancies" name="vacancies" value="{{ old('vacancies', $job?->vacancies) }}"
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
                                                        id="deadline" name="deadline" value="{{ old('deadline', $job?->deadline) }}">
                                                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Job Location</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Country <span class="text-danger">*</span></label>
                                                    <select name="country"
                                                        class="form-control select2 country {{ hasError($errors, 'country') }}"
                                                        id="">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option @selected($country?->id === $job?->country_id) value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">State <span class="text-danger">*</span></label>
                                                    <select name="state"
                                                        class="form-control select2 state {{ hasError($errors, 'state') }}"
                                                        id="">
                                                        <option value="">Select State</option>
                                                        @foreach ($states as $state )
                                                        <option @selected($state?->id === $job?->state_id) value="{{ $state?->id }}">{{ $state?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">City <span class="text-danger">*</span></label>
                                                    <select name="city"
                                                        class="form-control select2 city {{ hasError($errors, 'city') }}"
                                                        id="">
                                                        <option value="">Select City</option>
                                                        @foreach ($cities as $city )
                                                        <option @selected($city?->id === $job?->city_id) value="{{ $city?->id }}">{{ $city?->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Address <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control {{ hasError($errors, 'address') }}"
                                                        id="address" name="address" value="{{ old('address', $job?->address) }}"
                                                        placeholder="Enter the job address">
                                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Salary Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input @checked($job?->salary_mode === 'range') type="radio"
                                                                class=" {{ hasError($errors, 'salary_mode') }}"
                                                                id="salary_range" name="salary_mode" value="range">
                                                            <label for="salary_range">Salary Range</label>
                                                            <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input @checked($job?->salary_mode === 'custom') type="radio"
                                                                class=" {{ hasError($errors, 'salary_mode') }}"
                                                                id="custom_salary" name="salary_mode" value="custom">
                                                            <label for="custom_salary">Custom Salary</label>
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
                                                                value="{{ old('min_salary', $job?->min_salary) }}"
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
                                                                value="{{ old('max_salary', $job?->max_salary) }}"
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
                                                        value="{{ old('custom_salary', $job?->custom_salary) }}"
                                                        placeholder="Enter the custom salary">
                                                    <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Salary Type <span
                                                            class="text-danger">*</span></label>
                                                    <select name="salary_type"
                                                        class="form-control select2 {{ hasError($errors, 'salary_type') }}"
                                                        id="">
                                                        <option value="">Select Salary Type</option>
                                                        @foreach ($salaryTypes as $salaryType)
                                                            <option @selected($salaryType?->id === $job?->salary_type_id) value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Job Attributes</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Experience <span
                                                            class="text-danger">*</span></label>
                                                    <select name="experience"
                                                        class="form-control select2 {{ hasError($errors, 'experience') }}"
                                                        id="">
                                                        <option value="">Select Experience</option>
                                                        @foreach ($experiences as $experience)
                                                            <option @selected($experience?->id === $job?->job_experience_id) value="{{ $experience->id }}">{{ $experience->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Job Role <span
                                                            class="text-danger">*</span></label>
                                                    <select name="job_role"
                                                        class="form-control select2 {{ hasError($errors, 'job_role') }}"
                                                        id="">
                                                        <option value="">Select Job Role</option>
                                                        @foreach ($jobRoles as $jobRole)
                                                            <option @selected($jobRole?->id === $job?->job_role_id) value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Education <span
                                                            class="text-danger">*</span></label>
                                                    <select name="education"
                                                        class="form-control select2 {{ hasError($errors, 'education') }}"
                                                        id="">
                                                        <option value="">Select Education</option>
                                                        @foreach ($educations as $education)
                                                            <option @selected($education?->id === $job?->education_id) value="{{ $education->id }}">{{ $education->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Job Type <span
                                                            class="text-danger">*</span></label>
                                                    <select name="job_type"
                                                        class="form-control select2 {{ hasError($errors, 'job_type') }}"
                                                        id="">
                                                        <option value="">Select Job Type</option>
                                                        @foreach ($jobTypes as $jobType)
                                                            <option @selected($jobType?->id === $job?->job_type_id) value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Tags <span class="text-danger">*</span></label>
                                                    <select name="tags[]" multiple
                                                        class="form-control select2 {{ hasError($errors, 'tags') }}"
                                                        id="">
                                                        @php
                                                            $selectedTags = $job->tags()->pluck('tag_id')->toArray();
                                                        @endphp
                                                        <option value="">Select Tags</option>
                                                        @foreach ($tags as $tag)
                                                            <option @selected(in_array($tag->id, $selectedTags)) value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                                </div>
                                            </div>

                                            @php
                                                $benefits = $job->benefits()->with('benefit')->get();
                                                $benefitNames = [];
                                                foreach ($benefits as $benefit) {
                                                    $benefitNames[] = $benefit->benefit->name;
                                                }
                                                $benefitNameString = implode(',', $benefitNames);
                                            @endphp
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Benefits <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                        id="benefits" multiple name="benefits" value="{{ old('benefits', $benefitNameString) }}"
                                                        placeholder="Enter the job benefits">
                                                    <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Skills <span
                                                            class="text-danger">*</span></label>
                                                    <select name="skills[]" multiple
                                                        class="form-control select2 {{ hasError($errors, 'skills') }}"
                                                        id="">
                                                        @php
                                                            $selectedSkills = $job->skills()->pluck('skill_id')->toArray();
                                                        @endphp
                                                        <option value="">Select Skill</option>
                                                        @foreach ($skills as $skill)
                                                            <option @selected(in_array($skill->id, $selectedSkills)) value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Application Options</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Receive Applications <span
                                                            class="text-danger">*</span></label>
                                                    <select name="receive_application"
                                                        class="form-control select2 {{ hasError($errors, 'receive_application') }}"
                                                        id="">
                                                        <option value="">Select Any One</option>
                                                        <option @selected($job?->apply_on == 'app') value="app">On Our Platform</option>
                                                        <option @selected($job?->apply_on == 'email') value="email">On Our Email Address</option>
                                                        <option @selected($job?->apply_on == 'custom_url') value="custom_url">On Our Custom Link</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('receive_application')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Promote</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input @checked($job?->featured) type="checkbox"
                                                                class=" {{ hasError($errors, 'featured') }}"
                                                                id="featured" name="featured" value="1">
                                                            <label for="featured">Featured</label>
                                                            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input @checked($job?->highlight) type="checkbox"
                                                                class=" {{ hasError($errors, 'highlight') }}"
                                                                id="highlight" name="highlight" value="1">
                                                            <label for="highlight">Highlight</label>
                                                            <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
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
                                                        id="editor">{!! $job?->description !!}</textarea>
                                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
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

            $('input[name="salary_mode"]').on('click', function() {
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
