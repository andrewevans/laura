@extends('layouts.nerds')
<!-- app/views/nerds/edit.blade.php -->

@section('content')

    <h1>Edit {{ $nerd->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($nerd, array('route' => array('nerds.update', $nerd->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        <p>Projects</p>
        <ul>
            @foreach($all_projects as $project)
            <li>
                {{ Form::checkbox('project[' . $project->id . ']', $project->id, in_array($project->id, $partnerships), array('id' => 'project[' . $project->id . ']')) }}
                {{ Form::label('project[' . $project->id . ']', $project->name) }}
            </li>
            @endforeach
        </ul>
    </div>

{{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop