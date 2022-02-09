@extends('layouts.layout')

@section('content')

    @include('includes.errors')

    <div class="mt-3">
        {!! Form::open(['route' => 'movies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {{ Form::label('genres', 'Genres', ['class' => '']) }}
                <select name="genres[]" class="form-control" id="genres" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="file" class="form-control-file btn" id="image" name="image" accept=".jpg, .jpeg, .png">
                </div>
                <div class="custom-control custom-switch col-md-6">
                    <input type="checkbox" class="custom-control-input" name="is_published" id="is_published">
                    <label class="custom-control-label" for="is_published">Is published</label>
                </div>
            </div>
            {{ Form::submit('Add', ['class' => 'btn btn-outline-dark mt-3']) }}
        {!! Form::close() !!}
    </div>
@endsection
