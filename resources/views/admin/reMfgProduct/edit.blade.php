@extends('layouts.admin')
@section('content')

<h1>ReMFG EDIT</h1>

{!! Form::model($reProduct,['method' => 'PATCH','action' => ['ReMfgProductController@update',$reProduct->id]]) !!}
	<div class="form-group">
		{!! Form::label('product_name','Product Name:') !!}
		{!! Form::text('product_name',$reProduct->testable_type == 'App\Lab_test' ? $reProduct->lab_test->product->name : $reProduct->cpri_test->lab_test->product->name,['class' => 'form-control','disabled' => 'true']) !!}
	</div>
	

	<div class="form-group">
		{!! Form::label('result_id','Status:') !!}
		{!! Form::select('result_id',[''=>'Select Option']+ $results,null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@endsection()