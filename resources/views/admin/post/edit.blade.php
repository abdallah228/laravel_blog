@extends('layouts.app')
@section('content')

@include('admin.include.errors')

<div class="card">
        <div class="card-header"> Edit this post</div>
        <div class="card-body">


<form action="{{route('post.update',['id'=> $post->id]) }}" method="post" enctype="multipart/form-data">

	@csrf
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="featured">image:</label>
    <input type="file" class="form-control" id="fwatured" name="featured">
  </div>

  <div class="form-group">
    
    <label>Select Category</label>
    <select class="form-control" name="category_id">
      @foreach($category as $category)
      <option value="{{$category->id}}" 

        @if($category->id == $post->category->id)
        selected
        @endif
        >{{$category->name}}</option>
      @endforeach
    </select>

    <div class="form-group">
    <label>Select Tag</label>
    @foreach($tag as $tag)
    <div class="check-box">
    <label><input type="checkbox" name="tag[]" value="{{$tag->id}}" 
      @foreach($post->tags as $t)
      @if($tag->id == $t->id)
      checked
      @endif
  @endforeach
      >
      {{$tag->tag}}
    </label>
  @endforeach
    </div>
  </div>
  </div>

    <div class="form-group">
    <label for="content">content:</label>
    <textarea cols="6" rows="7" class="form-control" name="content" id="content">{{$post->content}}</textarea>
  </div>

  <div class="form-group">
  	<div class="text-center">
 	<button type="submit" class="btn btn-primary">Update</button>
 	</div>
	</div>
	</form>

    </div>
    </div>
@endsection

@section('style')
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
 <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

@endsection



@section('script')


<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script type="text/javascript">
  
$(document).ready(function() {
  $('#content').summernote();
});

</script>

@endsection