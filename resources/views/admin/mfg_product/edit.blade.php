@extends('layouts.admin')
@section('content')
	{!! Form::model($product,['method' => 'PATCH' , 'action' => ['ManufactureProductController@update',$product->id],'files' => true]) !!}

	
		<div class="row">
			<div class="col-md-4">
				<img src="/srs/public/storage/images/{{ $product->photo->name }}" alt="Product image" class="img-fluid rounded">
			</div>
			<div class="col-md-8">
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
			</div>
		</div>
		

	{!! Form::close() !!}
@endsection