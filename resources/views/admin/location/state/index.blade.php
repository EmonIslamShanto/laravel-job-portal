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
                            <h4>All States</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.states.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" style="height: 40px" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.states.create') }}"><i
                                    class="fas fa-plus-square"></i> Create New State</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                    @forelse ($states as $state)
                                        <tr>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $state->country?->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.states.edit', $state->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="{{ route('admin.states.destroy', $state->id) }}"
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
                                @if ($states->hasPages())
                                    {{ $states->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
