@extends('layouts.app')
@section('content')

<table class="table table-hover">
	
	<thead>
			<th>Image</th>
			<th>Title</th>
			<th>Delete</th>
			<th>Edit</th>
	</thead>

	@if($post->count() > 0)
	@foreach($post as $post)
	<tbody>
			<tr>
				<td>

						<img src="{{$post->featured}}" height="90px" width="80px">
					
					
				</td>

				<td>
					{{$post->title}}

				</td>

				<td>
						<a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary btn-sm">Edit</a>
				</td>
				<td>
					<a href="{{route('post.destroy',['id'=>$post->id])}}" class="btn btn-danger btn-sm">Trash</a>
				</td>

			</tr>
	</tbody>
	@endforeach
	@else

		<tr>
		<th colspan="5" class="text-center text-danger h1">No Item To Shown</th>
	</tr>
	@endif
</table>



@endsection