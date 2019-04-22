@extends('layouts.app')
@section('content')
@include('admin.include.errors')
<div class="card">
        <div class="card-header">Edit User Profile</div>
        <div class="card-body">

<form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="title">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
  </div>

    <div class="form-group">
    <label for="title"> email:</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>

    <div class="form-group">
  <label for="password">Password:</label>
  <input type="password" class="form-control" id="password" name="password">
</div>

  <div class="form-group">
    <label>Uploade Avatar</label>
    <input type="file" class="form-control" name="avatar" id="avatar">
    </div>

  <div class="form-group">
    <label for="title">Facebook url:</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->profile->facebook}}">
  </div>

    <div class="form-group">
    <label for="title">Youtube url:</label>
    <input type="text" class="form-control" id="youtube" name="youtube" value="{{$user->profile->youtube}}">
  </div>

  <div class="form-group">
    <label>About</label>
    <textarea class="form-control" name="about" id="about">{{$user->profile->about}}</textarea>

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