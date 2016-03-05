@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Teilnehmerverwaltung f&uuml;r {{ $circle->subject->name . ' ' . $circle->grade }} </div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($pupils as $pupil)
				 			<tr onclick="$(location).attr('href', '{{ url('/pupil/' . $pupil->id) }}');">
				 				<td>
				 					<div>{{ $pupil->firstname . ' ' . $pupil->surname }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->school->name }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $pupil->getGrade() . $pupil->letter }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
			</div>
				<form action="{{ url('/circle/' . $circle->id . '/edit') }}" role="form" method="get" class="form-inline">
					<div class="form-group">
						<label class="form-control-static">Nur Sch&uuml;ler der Klassenstufe</label>
						<select name="grade" class="form-control">
						@foreach (range($circle->grade - 1, $circle->grade + 1) as $tmpgrade)
							<option value="{{ $tmpgrade }}" {{ $grade == $tmpgrade ? 'selected' : '' }}>
							{{ $tmpgrade }}
							</option>
						@endforeach 
						</select>
					</div>
					<button type="submit" class="btn btn-default">Anzeigen</button>
				</form>	
		</div>
	</div>
</div>
@endsection