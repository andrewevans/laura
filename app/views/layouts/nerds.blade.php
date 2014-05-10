<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
<!--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
    {{ HTML::style('css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('css/nerds-default.css', array('media' => 'screen')) }}
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
            <li><a href="{{ URL::to('projects') }}">View All Projects</a></li>
            <li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>
            <li><a href="{{ URL::to('projects/create') }}">Create a Project</a>
        </ul>
    </nav>

    <h1>All the Nerds</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @yield('content')


</div>
</body>
</html>