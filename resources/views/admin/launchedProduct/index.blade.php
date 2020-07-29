@extends('layouts.admin')
@section('content')

<h1>Launched Product</h1>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			{{-- <th>Product Id</th> --}}
			<th>Name</th>
			<th>Code</th>
			<th>Image</th>
			<th>Description</th>
		</tr>
		
	</thead>
	<tbody>
		@foreach ($launchedProduct as $product)
			<tr>
				<td>{{ $product->id }}</td>
				{{-- <td>{{ $product->cpri_test->lab_test->product->id }}</td>	 --}}
				<td>{{ $product->cpri_test->lab_test->product->name }}</td>	
				<td>{{ $product->cpri_test->lab_test->product->code }}</td>	
				<td><img src="../storage/images/{{ $product->cpri_test->lab_test->product->photo->name }}" alt="Product Image" class="img-fluid rounded" width="100" height="100"></td>	
				<td>{{ $product->cpri_test->lab_test->product->description }}</td>	
			</tr>
			
		@endforeach
	</tbody>	
</table>
@endsection()