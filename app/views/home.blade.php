@extends('layout')

@section('content')
    @foreach($users as $user)
        <li>{{ link_to("/users/{$user->username}", $user->username) }} | {{ $user->email }}</li>
    @endforeach
@stop
