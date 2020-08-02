@extends('layouts.admin')
@section('content')

<h1>Manufacture Product </h1>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Photo</th>
			<th>MFG Code</th>
			<th>Description</th>
		</tr>		
	</thead>

	<tbody>
		@foreach ($MFG_product as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td><a href="/srs/public/admin/manufacture_product/{{ $product->id }}">{{ $product->name }}</a></td>
				<td><img src="../storage/images/{{ $product->photo->name }}" alt="product image" width="100" class="img-fluid rounded"></td>
				<td>{{ $product->code }}</td>
				<td>{{ $product->description }}</td>
			</tr>
		@endforeach
		
	</tbody>
	
</table>

@endsection