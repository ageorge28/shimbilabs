@extends('app')

@section('content')

<br />



<div class="card">

<div class="card-header">
    <h1>ShimBi Labs Responses</h1>
</div>
<div class="card-body">
    <br /><br />
<a href="{{ route('create') }}" class="btn btn-success" id="create-new-response">Add New Response</a>
<br><br>
<table class="table table-bordered table-striped" id="laravel_datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>
</div>

@endsection