@extends('layouts.layout')

@section('content')
    <div class="row">
        <a href="{{ route('genres.create') }}" class="btn btn-outline-dark">Create Genre</a>
    </div>
    <div class="row mt-2">
        <div>
            <table class="table table-bordered dataTable" id="dataTable" role="grid" style="width: 700px;">
                <thead>
                    <tr role="row">
                        <th style="width: 5%;">#</th>
                        <th style="width: 40%;">Name</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">#</th>
                        <th rowspan="1" colspan="1">Name</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr style="cursor: pointer">
                            <td>{{ $genre['id'] }}</td>
                            <td>{{ $genre['name'] }}</td>
                            <td width="20%" class="form-group">
                                <div class="d-inline-flex">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['genres.destroy', $genre->id]]) }}
                                        <button type="submit"
                                                title="Delete"
                                                class="btn btn-outline-light button-delete">
                                            <img src="{{ asset('assets/images/delete.png') }}" style="vertical-align: middle" width="18" height="18">
                                        </button>
                                    {{ Form::close() }}

                                    <span class="border-btn"></span>

                                    <a class="btn btn-outline-light button-edit" href="{{ route('genres.edit', $genre->id) }}">
                                        <img src="{{ asset('assets/images/edit.png') }}" style="vertical-align: middle" width="18" height="18">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
