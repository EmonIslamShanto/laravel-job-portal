@extends('front-end.layouts.master')


@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Profile</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('front-end.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true"> Basic </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false"> Profile </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-experience" type="button" role="tab"
                                aria-controls="pills-experience" aria-selected="false"> Education & Experience </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false"> Account Settings </button>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent">
                        @include('front-end.candidate-dashboard.profile.section.basic-section')
                        @include('front-end.candidate-dashboard.profile.section.profile-section')
                        @include('front-end.candidate-dashboard.profile.section.experience-section')
                        {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <form action="{{ route('company.profile.account-info') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">User Name *</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ auth()->user()->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ auth()->user()->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="box-button mt-15 col-md-2">
                                <button class="btn btn-apply-big font-md font-bold">Save</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="{{ route('company.profile.update-password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Password *</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" type="password" value="">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" type="password" value="">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="box-button mt-15 col-md-2">
                                <button class="btn btn-apply-big font-md font-bold">Save</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                            tabindex="0">...</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="experienceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="experienceForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Company Name *</label>
                                    <input name="company" type="text" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department *</label>
                                    <input name="department" type="text" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Designation *</label>
                                    <input name="designation" type="text" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Start Time *</label>
                                    <input name="start_date" type="text" class="form-control datepicker"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">End Time *</label>
                                    <input name="end_date" type="text" class="form-control datepicker"
                                        required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" value="1" name="currently_working"
                                        class="form-check-input" style="margin-right: 10px">
                                    <label class="form-check-label" for="typeCandidate">I am currently working</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Responsibilities</label>
                                    <textarea name="responsibilities" maxlength="500" class="form-control" id=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Experience</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var editId = "";
            var editMode = false;

            //fetch experience
            function fetchExperience() {
                $.ajax({
                    url: "{{ route('candidate.experience.index') }}",
                    type: 'GET',
                    data: {},

                    success: function(response) {
                        $('.experience-tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        notyf.error(xhr.responseJSON.message);
                    }
                });
            }

            //add experience
            $('#experienceForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let data = form.serialize();

                if (editMode) {
                    $.ajax({
                        url: "{{ route('candidate.experience.update', ':id') }}".replace(':id',
                            editId),
                        type: 'PUT',
                        data: data,
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchExperience();
                            $('#experienceForm').trigger('reset');
                            $('#experienceModal').modal('hide');
                            editMode = false;
                            editId = "";
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            hideLoader();
                            notyf.error(xhr.responseJSON.message);
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('candidate.experience.store') }}",
                        type: 'POST',
                        data: data,
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchExperience();
                            $('#experienceForm').trigger('reset');
                            $('#experienceModal').modal('hide');
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            hideLoader();
                            notyf.error(xhr.responseJSON.message);
                        }
                    });
                }

            });

            //edit experience
            $('body').on('click','.edit-experience', function() {
                $('#experienceForm').trigger('reset');
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {},
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        editMode = true;
                        editId = response.id;
                        $.each(response, function(index, value) {
                            $(`input[name="${index}"]`).val(value);
                            if (index === 'currently_working' && value === 1) {
                                $(`input[name="${index}"]:checkbox`).prop('checked',
                                    true);
                            }
                            if (index === 'responsibilities') {
                                $(`textarea[name="${index}"]`).val(value);
                            }
                        });
                        hideLoader();

                    },
                    error: function(xhr, status, error) {
                        notyf.error(xhr.responseJSON.message);
                        hideLoader();
                    }
                });
            });

            //delete experience
            $('body').on('click', '.delete-experience', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(response) {
                                fetchExperience();
                                hideLoader();
                                // window.location.reload();
                                notyf.success(response.massage);
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                                swal(xhr.responseJSON.massage, {
                                    icon: 'error',
                                })
                                hideLoader();
                            }
                        });
                    } else {
                        swal('Your data is safe!');
                    }
                });
            });
        });
    </script>
@endpush
