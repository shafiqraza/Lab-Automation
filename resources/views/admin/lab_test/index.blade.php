@extends('layouts.admin')
@section('content')

<h1>Laboratory Test</h1>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>id</th>
			<th>Test Name</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Result</th>
			<th>Details</th>
			<th>Test Count</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($test as $labTest)
			<tr>
				<td>{{ $labTest->id }}</td>
				<td>{{ $labTest->name }}</td>
				<td>{{ $labTest->product->name }}</td>
				<td><img src="../storage/images/{{ $labTest->product->photo->name }}" alt="Product Image" class="img-fluid rounded" width="100"></td>
				<td>{{ isset($labTest->result_id) ? ($labTest->result_id == 1) ?  'Success' : 'Failed' : 'NOT Complete YET' }}</td>
				<td>{{isset($labTest->details) ? $labTest->details : 'NOT Availible'  }}</td>
				<td>{{ $labTest->test_count }}</td>
				<td><a href="/srs/public/admin/labtest/{{ $labTest->id }}/edit" class="btn btn-warning">Edit</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection()