@extends('layouts.nerds')

@section('content')
    <h1>Edit project: {{ $project->name }}</h1>


    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}


{{ Form::model($project, array('method' => 'put', 'route' => array('projects.update', $project->id))) }}

    <div class="form-group">
        {{ Form::label('name', 'Name: ') }}
        {{ Form::textarea('name', null, array('class' => 'form-control')) }}
        <span>{{ $errors->first('name') }}</span>
    </div>
    <div class="form-group">
        {{ Form::label('cost', 'Cost: ') }}
        {{ Form::text('cost', null, array('class' => 'form-control')) }}
        <span>{{ $errors->first('cost') }}</span>
    </div>
    <div class="form-group">
        <p>Project Details</p>
        <ul>
            @foreach($project_details as $key => $project_detail)
            <li>
                {{ Form::label('project_detail[' . $key . '][title]', 'Detail Title: ') }}
                {{ Form::textarea('project_detail[' . $key . '][title]', $project_detail->title, array('class' => 'form-control')) }}

                {{ Form::label('project_detail[' . $key . '][description]', 'Detail Description: ') }}
                {{ Form::textarea('project_detail[' . $key . '][description]', $project_detail->description, array('class' => 'form-control')) }}
            </li>
            @endforeach
        </ul>
        <span>{{ $errors->first('title') }}</span><br />
        <span>{{ $errors->first('description') }}</span>
    </div>

    <ul>
        <li>
            {{ $project_details_create }}
        </li>
    </ul>

    <div>
        {{ Form::submit('Update PROJECT', array('class' => 'btn btn-primary')) }}
    </div>


{{ Form::close() }}


@stop