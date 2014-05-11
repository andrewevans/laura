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
        <p>Descriptions</p>
        <ul>
            @foreach($project_descriptions as $key => $project_description)
            <li>
                {{ Form::label('project_detail[' . $key . '][title]', 'Title: ') }}
                {{ Form::text('project_detail[' . $key . '][title]', $project_description->title, array('class' => 'form-control')) }}

                {{ Form::label('project_detail[' . $key . '][description]', 'Description: ') }}
                {{ Form::text('project_detail[' . $key . '][description]', $project_description->description, array('class' => 'form-control')) }}
            </li>
            @endforeach
        </ul>
        <span>{{ $errors->first('title') }}</span><br />
        <span>{{ $errors->first('description') }}</span>
    </div>

    <div>
        {{ Form::submit('Update PROJECT', array('class' => 'btn btn-primary')) }}
    </div>


{{ Form::close() }}


@stop