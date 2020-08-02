@extends('layouts.admin')
@section('content')

<table id="example" class="table table-striped table-bordered mt-5" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedbacks  as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->firstname }}</td>
                <td>{{ $feedback->lastname}}</td>
                <td>{{ $feedback->emal}}</td>
                <td>{{ $feedback->suject}}</td>
                <td>{{ $feedback->msg}}</td>
                <td> {{ $feedback->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>

@endsection()