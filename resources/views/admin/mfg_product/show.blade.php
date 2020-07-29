@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-md-6">
		<img src="/srs/public/storage/images/{{ $product->photo->name }}" alt="product img" class="img-fluid rounded">
	</div>
	<div class="col-md-6 mt-4">
		<p>Product Name: <br> <strong>{{ $product->name }}</strong></p>
		<p>Product Code: <br> <strong>{{ $product->code }}</strong></p>
		<p>Product Description: <br> <strong>{{ $product->description }}</strong></p>
	</div>
</div>

<div class="row justify-content-left mt-5">
	<div class="col-md-4"><a href="/srs/public/admin/manufacture_product/{{ $product->id }}/edit" class="btn btn-warning">Edit</a></div>
	<div class="col-md-4">
		{!! Form::open(['method' => 'DELETE', 'action' => ['ManufactureProductController@destroy',$product->id]]) !!}
			{!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection