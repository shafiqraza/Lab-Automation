@extends('layouts.admin')
@section('content')

	<h1>Create</h1>


@include('inc.msg')

	{!! Form::open(['method' => 'POST' , 'action' => 'ManufactureProductController@store','files' => true]) !!}

	
		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('photo_id','Photo:') !!}
			{!! Form::file('photo_id',null,['class' => 'form-control']) !!}
			
		</div>
		<div class="form-group">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 4]) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Product',['class' => 'btn btn-primary']) !!}
		</div>
		

	{!! Form::close() !!}

@endsection