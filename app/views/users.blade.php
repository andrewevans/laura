@extends('layout')

@section('content')
    @foreach($users as $user)
        <p>{{ $user->username }} | {{ $user->email}}</p>
    @endforeach
@stop
