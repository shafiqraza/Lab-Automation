@extends('layouts.admin')
@section('content')

  <h1>Edit User</h1>

	{!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]])!!}
		
		<div class="form-group">
			{!!Form::label('name', 'Name:') !!}
			{!! Form::text('name',$user->name,['class' => 'form-control','placeholder' => 'Name'])!!} 
			
		</div>

		<div class="form-group">
			{!!Form::label('emial', 'Email:') !!}

			{!! Form::email('email',$user->email,['class' => 'form-control','placeholder' => 'Email']) !!}
			
		</div>

		<div class="form-group">
			{!!Form::label('password', 'Password:') !!}

			{!! Form::password('password',['class' => 'form-control','placeholder' => 'Password']) !!}
			
		</div>
		<div class="form-group">
			{!!Form::label('role_id', 'Select Role:') !!}

			{!! Form::select('role_id',[1 => 'Admin'],null,['class'=>'form-control','disabled' => true] ) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Add User',['class' => 'btn btn-primary']) !!}
			
		</div>
	
	{!! Form::close() !!}

@endsection
