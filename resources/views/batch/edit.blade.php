@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Zirkel</div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($pupils as $pupil)
				 			<tr onclick="$(location).attr('href', '{{ url('/pupil/' . $pupil->id) }}');">
				 				<td>
				 					<div>{{ $pupil->surname }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->firstname }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
				<div class="panel-heading">
					<a href="{{ url('/circle/create') }}"> Neuen Schüler eintragen</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection