@extends('layouts.layout')

@section('content')

    @include('includes.errors')

    <div class="mt-3">
        {!! Form::open(['route' => 'genres.store', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name'); !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            {{ Form::submit('Add', ['class' => 'btn btn-outline-dark mt-3']) }}
        {!! Form::close() !!}
    </div>
@endsection
