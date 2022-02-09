@extends('layouts.layout')

@section('content')

    @include('includes.errors')

    {{ Form::model($movie, ['method' => 'patch', 'route' => ['movies.update', $movie->id], 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('genres', 'Genres', ['class' => '']) }}
            <select name="genres[]" class="form-control" id="genres" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @if (in_array($genre->id, $genresSelected)) selected="selected" @endif>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="file" class="form-control-file btn" id="image" name="image" accept=".jpg, .jpeg, .png">
                @if($movie->image)
                    <input type="hidden" name="oldImage" value="{{ $movie->image }}">
                    <img src="{{ Storage::url($movie->image) }}" width="200px"/>
                @endif
            </div>
            <div class="custom-control custom-switch col-md-6">
                <input type="checkbox" class="custom-control-input" name="is_published" id="is_published" {{  $movie->is_published == 1 ? 'checked value=1' : 'value=0' }}>
                <label class="custom-control-label" for="is_published">Is published</label>
            </div>
        </div>
        {{ Form::submit('Add', ['class' => 'btn btn-outline-dark mt-3']) }}
    {{ Form::close() }}
@endsection
