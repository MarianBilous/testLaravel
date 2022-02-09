@extends('layouts.layout')

@section('content')
    <div class="row">
        <a href="{{ route('movies.create') }}" class="btn btn-outline-dark">Create Movie</a>
    </div>
    <div class="row mt-2">
        <div>
            <table class="table table-bordered dataTable" id="dataTable" role="grid" style="width: 1200px;">
                <thead>
                    <tr role="row">
                        <th style="width: 5%;">#</th>
                        <th style="width: 40%;">Name</th>
                        <th style="width: 15%;">Is published</th>
                        <th style="width: 40%;">Genres</th>
                        <th style="width: 10%;">Image</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">#</th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Is published</th>
                        <th rowspan="1" colspan="1">Genres</th>
                        <th rowspan="1" colspan="1">Image</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr style="cursor: pointer">
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->is_published_to_string }}</td>
                            <td>
                                @foreach($movie->genres as $genre)
                                    @if ($loop->first)
                                        {{ $genre->name }}
                                    @else
                                        {{ ', ' . $genre->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-outline-light button-edit" href="{{ Storage::url($movie->image) }}">
                                    <img style="max-width: 200px" src="{{ Storage::url($movie->image) }}">
                                </a>
                            </td>
                            <td width="20%" class="form-group">
                                <div class="d-inline-flex">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['movies.destroy', $movie->id]]) }}
                                        <button type="submit"
                                                title="Delete"
                                                class="btn btn-outline-light button-delete">
                                            <img src="{{ asset('assets/images/delete.png') }}" style="vertical-align: middle" width="18" height="18">
                                        </button>
                                    {{ Form::close() }}

                                    <span class="border-btn"></span>

                                    <a class="btn btn-outline-light button-edit" href="{{ route('movies.edit', $movie->id) }}">
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
