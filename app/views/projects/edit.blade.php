@extends('layouts.nerds')

@section('content')
    <h1>Edit project: {{ $project->name }}</h1>


    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}


{{ Form::model($project, array('method' => 'put', 'route' => array('projects.update', $project->id))) }}

    <div class="form-group">
        {{ Form::label('name', 'Name: ') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
        <span>{{ $errors->first('name') }}</span>
    </div>
    <div class="form-group">
        {{ Form::label('cost', 'Cost: ') }}
        {{ Form::text('cost', null, array('class' => 'form-control')) }}
        <span>{{ $errors->first('cost') }}</span>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description: ') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
        <span>{{ $errors->first('description') }}</span>
    </div>

    <div>
        {{ Form::submit('Update PROJECT', array('class' => 'btn btn-primary')) }}
    </div>


{{ Form::close() }}


@stop