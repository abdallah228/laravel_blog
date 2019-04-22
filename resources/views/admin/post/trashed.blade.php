@extends('layouts.app')
@section('content')

<table class="table table-hover">
	
	<thead>
			<th>Image</th>
			<th>Title</th>
			<th>Edit</th>
			<th>Restore</th>
			<th>Delete</th>

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
						Edit

				</td>

				<td>
						<a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success btn-sm">Restore</a>
				</td>

				<td>
						<a href="{{route('trashed.delete',['id'=>$post->id])}}" class="btn btn-danger btn-sm">Delete</a>
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