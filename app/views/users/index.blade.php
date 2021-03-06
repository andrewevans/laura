@extends('layouts.default')

@section('content')
    <h1>All Users</h1>

    @if ($users->count())

        @foreach ($users as $user)
            <li>{{ link_to("people/users/{$user->username}", $user->username) }}</li>
        @endforeach
    @else
        <li>No users :(</li>
    @endif
@stop