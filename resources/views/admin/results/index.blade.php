@extends('layouts.admin')
@section('content')
<h1>Results</h1>

<div class="row">
	<div class="col-md-6">
		{!! Form::open(['method' => 'POST','action' => 'ResultsController@store']) !!}
			<div class="form-group">
				{!! Form::label('name','Name:') !!}
				{!! Form::text('name',null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
			</div>		

		{!! Form::close() !!}
	</div>
	<div class="col-md-6 mt-4">
		<table class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($results as $result)
					<tr>
						<td>{{ $result->id }}</td>
						<td>{{ $result->name }}</td>	
					</tr>
				
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection