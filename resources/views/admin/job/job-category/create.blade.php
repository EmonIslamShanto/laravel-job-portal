@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Job Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-dark">
                        <div class="card-header">
                            <h4>Create New Job Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.job-categories.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Category Icon</label>
                                            <div role="iconpicker" data-align="left" name= "icon"
                                                class=" {{ hasError($errors, 'icon') }}"></div>
                                            <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Category Name</label>
                                                    <input style="width: 50%" type="text" class="form-control {{ hasError($errors, 'name') }}"
                                                        id="name" name="name" value="{{ old('name') }}"
                                                        placeholder="Enter name of new job category">
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-5">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" style="width: 50%" type="submit">Create</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
