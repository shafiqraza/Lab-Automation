@extends('layouts.admin')
@section('content')
<h1>Edit Lab Test</h1>
@include('inc.msg')
{!! Form::model($test,['method' => 'PATCH','action'=>['LabTestController@update',$test->id]]) !!}
	<div class="form-group">
		{!! Form::label('name','Name:')!!}
		{!! Form::text('name',$test->name,['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('result_id','Result:') !!}
		{!! Form::select('result_id',['' => 'Select Option']+$result, null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('details','Description:') !!}
		{!! Form::textarea('details',null,['class' => 'form-control','rows' => 4]) !!}
	</div>
	{!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection()