@extends('layouts.nerds')
<!-- app/views/costs/index.blade.php -->
@section('content')
<h1>All the Costs</h1>



<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>#</td>
        <td width="150">Title</td>
        <td>Amount</td>
        <td width="400">Description</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($costs as $key => $value)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->amount }}</td>
        <td>{{ $value->description }}</td>
        <!-- we will also add show, edit, and delete buttons -->
        <td>

            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
            <!-- we will add this later since its a little more complicated than the other two buttons -->
            {{ Form::open(array('url' => 'costs/' . $value->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Cost', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('costs/' . $value->id) }}">Show this Cost</a>

            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('costs/' . $value->id . '/edit') }}">Edit this Cost</a>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@stop