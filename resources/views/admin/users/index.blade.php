@extends('layouts.admin')
@section('content')

  <h1>Users</h1>
   @if (Session::has('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ Session::get('msg') }}   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role->name }}</td>
          <td>{{ $user->created_at }}</td>
          <td>{{ $user->updated_at }}</td>
          <td><a href="/srs/public/admin/users/{{ $user->id }}/edit" class="btn btn-warning">Edit</a></td>
          <td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy',$user->id]]) !!}
            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
