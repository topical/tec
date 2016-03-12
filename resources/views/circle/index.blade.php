@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Zirkel</div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($circles as $circle)
				 			<tr onclick="$(location).attr('href', '{{ url('/circle/' . $circle->id) }}');">
				 				<td>
				 					<div>{{ $circle->subject->name }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $circle->grade }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
			</div>
			<button class="btn btn-default" onclick="location.href = '{{ url('/circle/create') }}'"><i class="fa fa-btn fa-plus"></i>Neuen Zirkel anlegen</button>
		</div>
	</div>
</div>
@endsection