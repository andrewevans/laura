@extends('layouts.default')

@section('content')
    <h1>Hello, {{ $user->username }}</h1>

<p>Your info is as follows:</p>

Username: {{ $user->username }}<br />
Email: {{ $user->email }}<br />
Password (in hash format): {{ $user->password }}<br />


{{ Form::model($user, array('method' => 'put', 'route' => array('users.update', $user->username))) }}
<div>
    {{ Form::label('email', 'Email: ') }}
    {{ Form::text('email') }}
    <span>{{ $errors->first('email') }}</span>
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