@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Cities</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update City</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Country</label>
                                        <select name="country" class="form-control select2 country {{ hasError($errors, 'country') }}" id="">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option @selected($country->id === $city->country_id) value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state">State</label>
                                        <select name="state" class="form-control select2 state {{ hasError($errors, 'state') }}" id="">
                                            <option value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option @selected($state->id === $city->state_id) value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control {{ hasError($errors, 'city') }}" id="name" name="city" value="{{ old('city',$city->name) }}" placeholder="Enter name of new State">
                                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
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
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: '{{ route("admin.get-states",":id") }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, state) {
                            html += `<option value="${state.id}">${state.name}</option>`;
                        });

                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        });
    </script>

@endpush
