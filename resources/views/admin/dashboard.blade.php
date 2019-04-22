@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-3">
    <div class="card ">
        <div class="card-header text-center card bg-danger">Published Post</div>

        <div class="card-body text-center ">
        	<h1>{{$post->count()}}</h1>
  		</div>
</div>
</div>


<div class="col-lg-3">
    <div class="card ">
        <div class="card-header text-center card bg-success">Trashed Post</div>

        <div class="card-body text-center ">
        	<h1>{{$trashed_post->count()}}</h1>
  		</div>
</div>
</div>


<div class="col-lg-3">
    <div class="card ">
        <div class="card-header text-center card bg-info">Users</div>

        <div class="card-body text-center ">
        	<h1>{{$user->count()}}</h1>
  		</div>
</div>
</div>


<div class="col-lg-3">
    <div class="card ">
        <div class="card-header text-center card bg-danger">Category</div>

        <div class="card-body text-center ">
        	<h1>{{$category->count()}}</h1>
  		</div>
</div>
</div>

</div>





@endsection
