@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Schulen</div>

				<table class = "table table-hover">
					<thead>
						<tr>
							<td>Name</td>
							<td>Adresse</td>
						</tr>
					</thead>
				 	<tbody>
				 		@foreach ($schools as $school)
				 			<tr>
				 				<td>
				 					<div>{{ $school->name }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $school->street . ', ' . $school->zipcode . ' ' . $school->town }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
				<div class="panel-heading">
					<a href="{{ url('/school/create') }}"> Neue Schule hinzuf&uuml;gen</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection