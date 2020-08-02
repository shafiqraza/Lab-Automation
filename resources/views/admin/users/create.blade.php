@extends('layouts.admin')
@section('content')

  <h1>Create User</h1>

  

	{!! Form::open(['method' => 'POST', 'action' => 'UserController@store'])!!}
		
		<div class="form-group">
			{!!Form::label('name', 'Name:') !!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Name'])!!} 
			@if ($errors->has('name'))
			<ul><li style="color: red" >{{ $errors->first('name') }}</li></ul>
			  	
			  @endif
			
		</div>

		<div class="form-group">
			{!!Form::label('emial', 'Email:') !!}

			{!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Email']) !!}
			@if ($errors->has('email'))
			<ul><li style="color: red" >{{ $errors->first('email') }}</li></ul>
				
			@endif
		</div>

		<div class="form-group">
			{!!Form::label('password', 'Password:') !!}

			{!! Form::password('password',['class' => 'form-control','placeholder' => 'Password']) !!}
			@if ($errors->has('password'))
			<ul><li style="color: red" >{{ $errors->first('password') }}</li></ul>
				{{-- expr --}}
			@endif
		</div>
		<div class="form-group">
			{!!Form::label('role_id', 'Select Role:') !!}

			{!! Form::select('role_id',['' => 'Select Role',1 => 'Admin'],null,['class'=>'form-control'] ) !!}
			@if ($errors->has('role_id'))
			<ul><li style="color: red" >{{ $errors->first('role_id') }}</li></ul>
				
			@endif
		</div>

		<div class="form-group">
			{!! Form::submit('Add User',['class' => 'btn btn-primary']) !!}
			
		</div>
	
	{!! Form::close() !!}

@endsection
