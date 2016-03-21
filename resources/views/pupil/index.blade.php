@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sch&uuml;er</div>

				<table class = "table table-hover">
					<thead>
						<tr>
							<td>Vorname</td>
							<td>Nachname</td>
							<td>Klasse</td>
							<td>Schule</td>
							<td>Adresse</td>
						</tr>
					</thead>
				 	<tbody>
				 		@foreach ($pupils as $pupil)
				 			<tr onclick="$(location).attr('href', '{{ url('/pupil/' . $pupil->id) }}');">
				 				<td>
				 					<div>{{ $pupil->firstname }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->surname }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->getGrade() . $pupil->letter }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->school->name }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->street . ', ' . $pupil->zipcode . ' ' . $pupil->town }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>	
			</div>
			<button class="btn btn-default" onclick="location.href = '{{ url('/pupil/create') }}'"><i class="fa fa-btn fa-plus"></i>Neuen Sch&uuml;ler hinzuf&uuml;gen</button>
            <p/>
		</div>
	</div>
</div>
@endsection