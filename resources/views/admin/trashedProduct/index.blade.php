@extends('layouts.admin')
@section('content')
<h1>Trashed Items</h1>


<table id="example" class="table table-striped table-bordered mt-5" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Failed Test</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trashedProduct  as $trash)
            <tr>
                <td>{{ $trash->id }}</td>
                <td>{{ $trash->testable_type }}</td>
                <td>{{ $trash->lab_test->product->name}}</td>
                <td><img src="../storage/images/{{ $trash->lab_test->product->photo->name}}" alt="Product Image" class="img-fluid rounded" width="100"></td>
                <td> {{ $trash->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>

@endsection()