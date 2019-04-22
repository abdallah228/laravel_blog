@extends('layouts.app')
@section('content')

<table class="table table-hover">
	
	<thead>
			<th>Image</th>
			<th>Name</th>
			<th>Permession</th>
			<th>Delete</th>
	</thead>

	@if($user->count() > 0)
	@foreach($user as $user)
	<tbody>
			<tr>
				<td>
				<img src="{{asset($user->profile->avatar)}}" height="50px" width="50px" style="border-radius:50%;">
				</td>

				<td>
					{{$user->name}}

				</td>

				<td>
						@if($user->admin)
						
							<a class="btn btn-info btn-sm" href="{{route('user.not.admin',['id'=>$user->id])}}">Delete Permession</a>
						
						@else
						
							<a class="btn btn-danger btn-sm" href="{{route('user.admin',['id'=>$user->id])}}">Make Admin admin</a>
						
						@endif
				</td>
				<td>
					@if(Auth::id() !== $user->id)
						<a  href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger btn-sm">Delete</a>
						@endif
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