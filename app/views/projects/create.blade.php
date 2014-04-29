@extends('layouts.nerds')
<!-- app/views/nerds/create.blade.php -->

@section('content')

    <h1>Create a PROJECT</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'projects')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'Cost') }}
        {{ Form::text('cost', Input::old('cost'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('cost'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the PROJECT!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop