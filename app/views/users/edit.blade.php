@extends('layouts.default')

@section('content')
    <h1>Edit user: {{ $user->username }}</h1>



{{ Form::model($user, array('method' => 'put', 'route' => array('users.update', $user->id))) }}
<div>
    {{ Form::label('username', 'Username: ') }}
    {{ Form::text('username') }}
    <span>{{ $errors->first('username') }}</span>
</div>
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