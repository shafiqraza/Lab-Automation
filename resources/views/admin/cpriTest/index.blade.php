@extends('layouts.admin')
@section('content')

<h1>CPRI Test</h1>
	
{{-- <table id="example" class="table table-striped table-bordered mt-5" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>CPRI Result</th>
			<th>CPRI Details</th>
			<th>Previous Test</th>
			<th>Lab Test Results</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			@foreach($cpriTest as $test)
				<tr>
				<td>{{ $test->id }}</td>
				<td>{{ $test->name }}</td>
				<td>{{ isset($test->result->name) ? $test->result->name : 'Processing' }}</td>
				<td>{{ isset($test->details) ?  $test->details : 'Processing'}}</td>
				<td>{{ $test->lab_test->name }}</td>
				<td>{{ $test->lab_test->details }}</td>
				<td>{{ $test->lab_test->product->name }}</td>
				<td><img src="../storage/images/{{ $test->lab_test->product->photo->name }}" alt="product Image" width="100" class="img-fluid"></td>
				<td><a href="/srs/public/admin/cpritest/{{ $test->id }}/edit" class="btn btn-warning">Edit</a></td>
</tr>
			@endforeach
		</tr>
	</tbody>
</table> --}}


<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Id</th>
			<th>Name</th>
			<th>CPRI Result</th>
			<th>CPRI Details</th>
			<th>Previous Test</th>
			<th>Lab Test Results</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Edit</th>
            </tr>
        </thead>
        <tbody>
           @foreach($cpriTest as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->name }}</td>
				<td>{{ isset($test->result->name) ? $test->result->name : 'Processing' }}</td>
				<td>{{ isset($test->details) ?  $test->details : 'Processing'}}</td>
                <td>{{ $test->lab_test->name }}</td>
				<td>{{ $test->lab_test->details }}</td>
				<td>{{ $test->lab_test->product->name }}</td>
                <td><img src="../storage/images/{{ $test->lab_test->product->photo->name }}" alt="product Image" width="100" class="img-fluid"></td>

				<td><a href="/srs/public/admin/cpritest/{{ $test->id }}/edit" class="btn btn-warning">Edit</a></td>
              
            </tr>
			@endforeach

        </tbody>

        
            
            
            
    </table>
@endsection()