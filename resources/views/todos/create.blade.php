@extends('layouts.app')

@section('content')
	<h1>Creata TodoList</h1>
	@if (Auth::guest())

	@else

	@endif
	{!! Form::open(['action' => 'Todoscontroller@store', 'method' => 'POST']) !!}
		<div class="form-group">
			{{Form::label('text', 'Text')}}
			{{Form::text('text', '', ['class' => 'form-control', 'placeholder'=> 'Enter Name'])}}
		</div>

			{{Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'placeholder'=> 'Enter Name'])}}
		<div class="form-group">
			{{Form::label('body', 'Body')}}
			{{Form::textarea('body', '',  ['class' => 'form-control', 'placeholder'=> 'Enter Body'])}}
		</div>

		<div class="form-group">
			{{Form::label('due', 'Due')}}
			{{Form::text('due', '', ['class' => 'form-control', 'placeholder'=> 'Enter due date'])}}
		</div>

		<div>
			{{Form::submit('Submit',  ['class' => 'btn btn-primary'])}}
		</div>

	{!! Form::close() !!}

@endsection