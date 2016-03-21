@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" onclick="$(location).attr('href', '{{ url('/circle/' . $circle->id) }}');">
					Teilnehmerverwaltung f&uuml;r {{ $circle->subject->name . ' ' . $circle->grade }} 
				</div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($pupils as $pupil)
				 			<tr>
				 				<td style="vertical-align: middle">
				 					<div>{{ $pupil->firstname . ' ' . $pupil->surname }}</div>
				 				</td>
				 				<td style="vertical-align: middle">
				 					<div>{{ $pupil->school->name }}</div>
				 				</td>
				 				<td style="vertical-align: middle">
				 					<div>{{ $pupil->getGrade() . $pupil->letter }}</div>
				 				</td>
				 				<td style="vertical-align: middle">
				 					@if ($registered_pupils->contains($pupil))
				 					<button class="btn btn-danger" type="button" onclick="
                                    	$.get( '{{ url('/registration/remove') }}',
                                    			{ pupil_id : {{ $pupil->id }}, 
                                    			  circle_id : {{ $circle->id }}
                                    			}, function() { location.reload(); } );
					 				">Austragen</button>
				 					@else
				 					<button class="btn" type="button" onclick="
                                    	$.get( '{{ url('/registration/add') }}',
                                    			{ pupil_id : {{ $pupil->id }}, 
                                    			  circle_id : {{ $circle->id }}
                                    			}, function() { location.reload(); } );
				 					">Eintragen</button>
				 					@endif
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