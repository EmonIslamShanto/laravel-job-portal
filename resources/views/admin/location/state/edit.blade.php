@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>States</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update State</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.states.update', $state->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Country</label>
                                        <select name="country" class="form-control select2 {{ hasError($errors, 'country') }}" id="">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option @selected($state->country_id===$country->id) value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">State</label>
                                        <input type="text" class="form-control {{ hasError($errors, 'name') }}" id="name" name="name" value="{{ old('name',$state->name) }}" placeholder="Enter name of new State">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
