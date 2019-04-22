@extends('layouts.app')
@section('content')

<table class="table table-hover">
	
	<thead>
			<th>Tag Name</th>
			<th>Edit</th>
			<th>Delete</th>
	</thead>
	@if(count($tag) > 0)
	@foreach($tag as $tag)
	<tbody>
			<tr>
				<td>
					{{$tag->tag}}
				</td>

				<td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-info btn-sm">Edit</a></td>
				<td><a href="{{route('tag.delete',['id'=>$tag->id])}}" class="btn btn-danger btn-sm">Delete</a></td>

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