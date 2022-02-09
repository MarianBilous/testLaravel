@extends('layouts.layout')

@section('content')

    @include('includes.errors')

    {{ Form::model($genre, ['method' => 'patch', 'route' => ['genres.update', $genre->id]]) }}
        <div class="form-group">
            {!! Form::label('name', 'Name'); !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        {{ Form::submit('Add', ['class' => 'btn btn-outline-dark mt-3']) }}
    {!! Form::close() !!}
@endsection
