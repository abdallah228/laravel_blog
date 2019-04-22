@extends('layouts.app')
@section('content')


@include('admin.include.errors')
<div class="card">
        <div class="card-header">edit {{$tag->tag}}</div>
        <div class="card-body">

<form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
  @csrf
  <div class="form-group">
    <label for="title">Add new Tag:</label>
    <input type="text" class="form-control" id="tag" name="tag" value="{{$tag->tag}}">
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