@extends('layouts.app')
@section('content')



@include('admin.include.errors')

<div class="card">
        <div class="card-header">Update Setting</div>
        <div class="card-body">

<form action="{{route('setting.update')}}" method="post">
	@csrf
  <div class="form-group">
    <label for="title">Site_name:</label>
    <input type="text" class="form-control" id="name" name="site_name" value="{{$setting->site_name}}">
  </div>

    <div class="form-group">
    <label for="title">contact_number:</label>
    <input type="text" class="form-control" id="name" name="contact_number" value="{{$setting->contact_number}}">
  </div>

    <div class="form-group">
    <label for="title">contact_email:</label>
    <input type="text" class="form-control" id="name" name="contact_email" value="{{$setting->contact_email}}">
  </div>

  <div class="form-group">
    <label for="title">address</label>
    <input type="text" class="form-control" id="name" name="address" value="{{$setting->address}}">
  </div>

 

  <div class="form-group">
  	<div class="text-center">
 	<button type="submit" class="btn btn-danger">Update</button>
 	</div>
	</div>
	</form>

    </div>
    </div>


@endsection