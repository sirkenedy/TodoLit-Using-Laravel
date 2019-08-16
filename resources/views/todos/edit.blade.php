@extends('layouts.app')

@section('content')
	<a href="/todo/{{$todo->id}}" class="btn btn-default">Go Back</a>
	<h1>Edit Todo</h1>
	{!! Form::open(['action' => ['Todoscontroller@update', $todo->id], 'method' => 'POST']) !!}
		<div class="form-group">
			{{Form::label('text', 'Text')}}
			{{Form::text('text', $todo->text, ['class' => 'form-control', 'placeholder'=> 'Enter Name'])}}
		</div>

		<div class="form-group">
			{{Form::label('body', 'Body')}}
			{{Form::textarea('body', $todo->body,  ['class' => 'form-control', 'placeholder'=> 'Enter Body'])}}
		</div>

		<div class="form-group">
			{{Form::label('due', 'Due')}}
			{{Form::text('due', $todo->due, ['class' => 'form-control', 'placeholder'=> 'Enter due date'])}}
		</div>
			{{Form::hidden('_method', 'PUT')}}
		<div>
			{{Form::submit('Submit',  ['class' => 'btn btn-primary'])}}
		</div>

	{!! Form::close() !!}

@endsection