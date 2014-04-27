<!doctype html>
<html lang="en">
<meta charset=""utf-8">
<head>

</head>
<body>

    {{ Form::open(['route' => 'sessions.store']) }}
    <div>
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email') }}
        <span>{{ $errors->first('username') }}</span>
    </div>
    <div>
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password') }}
        <span>{{ $errors->first('password') }}</span>
    </div>
    <div>
        {{ Form::submit('Login') }}
    </div>
    {{ Form::close() }}

</body>
</html>
