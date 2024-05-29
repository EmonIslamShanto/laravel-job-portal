<div class="tab-pane fade show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="mb-4">
        <form action="{{ route('candidate.profile.account-info.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h4>Location</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">Country *</label>
                                <select class="form-control {{ hasError($errors, 'country') }} form-icons select-active country"
                                    name="country" id="">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option @selected($country->id == $candidate?->country) value="{{ $country->id }}">{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">State</label>
                                <select class="form-control {{ hasError($errors, 'state') }} form-icons select-active state"
                                    name="state" id="">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option @selected($state->id == $candidate?->state) value="{{ $state->id }}">{{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">City</label>
                                <select class="form-control {{ hasError($errors, 'city') }} form-icons select-active city"
                                    name="city" id="">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option @selected($city->id == $candidate?->city) value="{{ $city->id }}">{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Address</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                                    name="address" value="{{ $candidate?->address }}">
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Your Contact Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                    name="phone" value="{{ $candidate?->phone_one }}">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Secondary Phone</label>
                                <input class="form-control {{ $errors->has('secondary_phone') ? 'is-invalid' : '' }}" type="text"
                                    name="secondary_phone" value="{{ $candidate?->phone_two }}">
                                <x-input-error :messages="$errors->get('secondary_phone')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-15">
                    <button class="btn btn-primary font-md font-bold">Save All Information</button>
                </div>
            </div>
        </form>
    </div>

    <div class="mb-4">
        <form action="{{ route('candidate.profile.account-email.update') }}" method="POST" class="mt-4">
            @csrf
            <div class="row">
                <h4>Change Account Email Address</h4>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Account Email*</label>
                        <input class="form-control {{ $errors->has('account_email') ? 'is-invalid' : '' }}" type="text"
                            name="account_email" value="{{ auth()->user()->email }}">
                        <x-input-error :messages="$errors->get('account_email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group mt-15">
                    <button class="btn btn-primary font-md font-bold">Change Email</button>
                </div>
            </div>
        </form>
    </div>

    <div class="mb-4">
        <form action="{{ route('candidate.profile.account-password.update') }}" method="POST" class="mt-4">
            @csrf
            <div class="row">
                <h4>Change Account Password</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Password *</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" value="">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                            <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                                name="password_confirmation" value="">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group mt-15">
                    <button class="btn btn-primary font-md font-bold">Change Password</button>
                </div>
            </div>
        </form>
    </div>


</div>


@push('scripts')
    <script>
        $(document).ready(function() {
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
