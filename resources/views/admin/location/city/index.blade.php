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
                            <h4>All Cities</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.cities.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" style="height: 40px" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.cities.create') }}"><i
                                    class="fas fa-plus-square"></i> Create New City</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                    @forelse ($cities as $city)
                                        <tr>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ $city->state?->name }}</td>
                                            <td>{{ $city->country?->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.cities.edit', $city->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="{{ route('admin.cities.destroy', $city->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td clospan="3" class="text-center">No Country found!!!</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($cities->hasPages())
                                    {{ $cities->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
