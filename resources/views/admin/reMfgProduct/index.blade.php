@extends('layouts.admin')
@section('content')

<h1>ReMFG Product</h1>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Test Name</th>
			<th>Test Type</th>
			<th>Test Details</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Status</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($reMfgPro as $product)
			
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->testable_type == 'App\Lab_test' ? $product->lab_test->name : $product->cpri_test->name }}</td>
				<td>{{ $product->testable_type == 'App\Lab_test' ? 'Laboratory Test' : 'CPRI Test'}}</td>
				<td>{{ $product->testable_type == 'App\Lab_test' ? $product->lab_test->details : $product->cpri_test->details}}</td>
				<td>{{ $product->testable_type == 'App\Lab_test' ? $product->lab_test->product->name : $product->cpri_test->lab_test->product->name}}</td>
				<td><img src="{{ $product->testable_type == 'App\Lab_test' ? '../storage/images/' .$product->lab_test->product->photo->name : '../storage/images/'.$product->cpri_test->lab_test->product->photo->name}}" alt="Product Image" class="img-fluid rounded" width="100"></td>
				<td>{{ isset($product->result_id) ? $product->result->name : 'In Process'}}</td>
				<td><a href="/srs/public/admin/remfgproduct/{{ $product->id }}/edit" class="btn btn-warning">Edit</a></td>
			</tr>
		@endforeach()
	</tbody>
</table>

@endsection()