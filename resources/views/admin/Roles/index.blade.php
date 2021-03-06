@extends('layouts.admin')
@section('content')
<h1>Roles</h1>

<div class="row">
	<div class="col-md-6">
		{!! Form::open(['method' => 'POST','action' => 'RoleController@store']) !!}
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
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
					<tr>
						<td>{{ $role->id }}</td>
						<td>{{ $role->name }}</td>	
						<td>
							
							{!! Form::open(['method' => 'DELETE', 'action' => ['RoleController@destroy',$role->id]]) !!}
								{!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>	
					</tr>
				
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection