@extends('layouts.app')

@section('content')

<a class="btn btn-default" href="/">Go Back</a>
<h3> <a href="todo/{{$todo->id}}"> {{$todo->text}} </a></h3>
<div class="label label-danger">{{$todo->due}} </div>
<hr>
<p>{{$todo->body}}</p>
<a href="/todo/{{$todo->id}}/edit" class="btn btn-default">Edit</a>
<!-- <a href="/todo/{{$todo->id}}/delete" class="btn btn-danger">Delete</a> -->
	{!! Form::open(['action' => ['Todoscontroller@destroy', $todo->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
		{{Form::hidden('_method', 'DELETE')}}
		<div>
			{{Form::submit('Delete',  ['class' => 'btn btn-danger'])}}
		</div>
	{!! Form::close() !!}

@endsection