@extends('app')

@section('content')

<div class="card">

    <div class="card-header">
        <h1>ShimBi Labs - View Response</h1>
    </div>

    <div class="card-body">


   
    <div class="row">
        <div class="col-2">First Name: </div>
        <div class="col-3">{{ $response->first_name }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-2">Last Name: </div>
        <div class="col-3">{{ $response->last_name }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-2">Email: </div>
        <div class="col-3">{{ $response->email }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-2">Mobile Number: </div>
        <div class="col-3">{{ $response->mobile }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-2">Talk Title: </div>
        <div class="col-3">{{ $response->talk_title }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-2">Profile Photo: </div>
        <div class="col-4">
            <img style="width:100px; height: 100px" src="{{ asset('uploads/' . $response->image) }}" /> 
        </div>
    </div>
    <div class="row mt-3 col-sm-offset-2 col-sm-10">
        <a href="{{ route('home') }}" class="btn btn-primary">Go Back</a>
    </div>

@endsection