@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Zirkel</div>

				<table class = "table table-hover">
					<thead>
						<tr>
							<td>Fach</td>
							<td>Klasse</td>
						</tr>
					</thead>
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
				<div class="panel-heading">
					<a href="{{ url('/circle/create') }}"> Neuen Zirkel anlegen</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection