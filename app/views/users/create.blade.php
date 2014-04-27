@extends('layouts.default')

@section('content')
    <h1>Create new user</h1>

    {{ Form::open(['route' => 'sessions.store']) }}
        <div>
            {{ Form::label('username', 'Username: ') }}
            {{ Form::text('username') }}
            <span>{{ $errors->first('username') }}</span>
        </div>

        <div>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::password('password') }}
            <span>{{ $errors->first('password') }}</span>
        </div>

        <div>
            {{ Form::submit('Create User') }}
        </div>


{{ Form::close() }}

@stop