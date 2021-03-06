@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nutzer</div>

				<table class = "table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>e-mail</th>
							<th>Admin</th>
						</tr>
					</thead>
				 	<tbody>
				 		@foreach ($users as $user)
				 			<tr onclick="$(location).attr('href', '{{ url('/user/' . $user->id . '/edit') }}');">
				 				<td>
				 					<div>{{ $user->name }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $user->email }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $user->admin ? 'ja' : '' }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
			</div>		
			<button  class="btn btn-default" type="submit" onclick="location.href = '{{ url('/user/create') }}'"><i class="fa fa-btn fa-plus"></i>Neuen Nutzer anlegen</button>
		</div>
	</div>
</div>
@endsection