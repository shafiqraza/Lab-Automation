@extends('layouts.admin')
@section('content')

<h1>CPRI Test Edit</h1>

{!! Form::model($cpriTest,['method' => 'PATCH','action' => ['CpriTestController@update',$cpriTest->id]]) !!}
	<div class="form-group">
		{!! Form::label('name','Name:') !!}
		{!! Form::text('name',$cpriTest->name,['class' => 'form-control		']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('result_id','Result:') !!}
		{!! Form::select('result_id',['' => 'Select Option']+ $result,null,['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('details','Description:') !!}
		{!! Form::textarea('details',$cpriTest->details,['class' => 'form-control' , 'rows'=>4]) !!}
	</div>
	{!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection