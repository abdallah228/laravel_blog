@extends('layouts.app')
@section('content')




@include('admin.include.errors')
<div class="card">
        <div class="card-header">edit {{$category->name}}</div>
        <div class="card-body">

<form action="{{route('category.update',['id'=>$category->id])}}" method="post">
  @csrf
  <div class="form-group">
    <label for="title">Add new Category:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
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