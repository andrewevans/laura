@extends('layouts.nerds')
<!-- app/views/nerds/show.blade.php -->

@section('content')

    <h1>Showing {{ $nerd->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $nerd->name }} of {{ $nerd->location }} ( {{ $nerd->slug }} )</h2>
        <p>
            <strong>Email:</strong> {{ $nerd->email }}<br />
            <strong>Level:</strong> {{ $nerd->nerd_level }}<br />

            <strong>Projects:</strong>
            <ul>
                @foreach ($nerd->projects as $project)
                    <li>{{ link_to("/projects/{$project->id}",$project->name) }}</li>
                @endforeach
            </ul>
        </p>
    </div>

@stop