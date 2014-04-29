@extends('layouts.nerds')

@section('content')
<!-- app/views/nerds/index.blade.php -->

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Project name</td>
        <td>Cost</td>
        <td>Description</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $key => $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->cost }}</td>
        <td>{{ $value->description }}</td>

        <!-- we will also add show, edit, and delete buttons -->
        <td>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@stop