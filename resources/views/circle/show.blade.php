@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $circle->subject->name . ' ' . $circle->grade }} </div>

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
			<button  class="btn btn-default" type="submit" onclick="location.href = '{{ url('/circle/' . $circle->id . '/edit') }}'">Teilnehmer verwalten</button>
			<button class="btn btn-default" type="submit" onclick="location.href = '{{ url('/batch?circle_id=' . $circle->id) }}'"> Aufgaben verwalten</button>
			<button class="btn btn-info pull-right" type="submit" onclick="location.href = '{{ url('/circle/' . $circle->id . '/edit') }}'">Auswertung</button>	
		</div>
	</div>
</div>
@endsection