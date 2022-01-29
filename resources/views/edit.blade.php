@extends('app')

@section('content')

<div class="card">

    <div class="card-header">
        <h1>ShimBi Labs - Edit Response</h1>
    </div>

    <div class="card-body">

<form id="responseForm" action="{{ route('update', $response->id) }}" name="responseForm" class="form-horizontal" method="post" enctype="multipart/form-data">
    
    @csrf

    @method('PUT')

    <div class="form-group">
        <label for="first_name" class="col-sm-12 control-label">
            First Name
            <small class="text-danger">*</small>
        </label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name"
                maxlength="50" value="{{ $response->first_name }}">
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
               maxlength="50" value="{{ $response->last_name }}">
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
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" 
                maxlength="100" value="{{ $response->email }}">
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
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" 
                maxlength="10" value="{{ $response->mobile }}">
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
                maxlength="200" value="{{ $response->talk_title }}">
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
            <br />
            <img src="{{ asset('uploads/' . $response->image) }}" style="height:50px; width:50px" />
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