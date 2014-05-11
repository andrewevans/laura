@extends('layouts.nerds')

@section('content')
<!-- app/views/nerds/index.blade.php -->

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Project name</td>
        <td>Cost</td>
        <td width="200">Project Details</td>
        <td>Nerds involved</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->cost }}</td>
        <td>
            @foreach($project_details as $project_detail)
                @if ($value->id == $project_detail->project_id)
                    <b>{{ $project_detail->title }}:</b>
                    <pre>{{ $project_detail->description }}</pre>
                @endif
            @endforeach
        </td>
        <td>
            @foreach($value->nerds as $nerd)
            <pre>{{ link_to("/nerds/{$nerd->id}", $nerd->name) }}</pre>
            @endforeach
        </td>

        <!-- we will also add show, edit, and delete buttons -->
        <td>

            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
            <!-- we will add this later since its a little more complicated than the other two buttons -->
            {{ Form::open(array('url' => 'projects/' . $value->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this PROJECT', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('projects/' . $value->id) }}">Show this PROJECT</a>

            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('projects/' . $value->id . '/edit') }}">Edit this PROJECT</a>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@stop