@extends('app')

@section('content')

<div class="card">

    <div class="card-header">
        <h1>ShimBi Labs - Create Response</h1>
    </div>

    <div class="card-body">

<form id="responseForm" action="{{ route('store') }}" name="responseForm" class="form-horizontal" method="post" enctype="multipart/form-data">
    
    @csrf
    
    <input type="hidden" name="response_id" id="response_id">
    <div class="form-group">
        <label for="first_name" class="col-sm-12 control-label">
            First Name
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name"
                maxlength="50">
            @error('first_name')
                <small id="first_name-error" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="last_name" class="col-sm-12 control-label">
            Last Name
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name"
                value="" maxlength="50">
            @error('last_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-12 control-label">
            Email
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value=""
                maxlength="100">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="mobile" class="col-sm-12 control-label">
            Mobile Number
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" value=""
                maxlength="10">
            @error('mobile')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="talk_title" class="col-sm-12 control-label">
            Talk Title
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="talk_title" name="talk_title" placeholder="Enter Talk Title"
                value="" maxlength="200">
            @error('talk_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 control-label">Your Profile Photo</label>
        <div class="col-sm-12">
            <input id="image" type="file" name="image" accept="image/*" />
            <br />
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="hidden" name="hidden_image" id="hidden_image">
        </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" id="btn-save" value="create">
            Submit
        </button>
        <a href="{{ route('home') }}" class="btn btn-primary">Go Back</a>
    </div>
</form>

    </div>
</div>
@endsection