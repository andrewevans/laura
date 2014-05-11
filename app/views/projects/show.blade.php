@extends('layouts.nerds')
<!-- app/views/projects/show.blade.php -->

@section('content')

    <h1>Showing {{ $project->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $project->name }}</h2>
        <p>
            <strong>Name:</strong> {{ $project->name }}<br />
            <strong>Cost:</strong> {{ $project->cost }}<br />
            <strong>Project Details:</strong><br /><br />
            @foreach($project_details as $project_detail)
            <b>{{ $project_detail->title }}</b><br />
            {{ $project_detail->description }}<br /><br>
            @endforeach

            <br />
            <strong>Nerds partnered with:</strong><br />
            <ul>
                @foreach ($project->nerds as $nerd)
                    <li>{{ link_to("/nerds/{$nerd->id}", $nerd->name) }}</li>
                @endforeach
            </ul>


        </p>
    </div>

@stop