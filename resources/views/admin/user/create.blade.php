@extends('layouts.app')
@section('content')
@include('admin.include.errors')
<div class="card">
        <div class="card-header">Add new User</div>
        <div class="card-body">

<form action="{{route('user.store')}}" method="post">
	@csrf
  <div class="form-group">
    <label for="title">User Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>

    <div class="form-group">
    <label for="title">Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
 

  <div class="form-group">
  	<div class="text-center">
 	<button type="submit" class="btn btn-danger">Submit</button>
 	</div>
	</div>
	</form>

    </div>
    </div>





@endsection