@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" onclick="$(location).attr('href', '{{ url('/circle/' . $circle->id) }}');">
					Aufgaben f&uuml;r {{ $circle->subject->name . ' ' . $circle->grade }} 
				</div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($batches as $batch)
				 			<tr onclick="$(location).attr('href', '{{ url('/batch/' . $batch->id . '/edit') }}');">
				 				<td/>
				 				<td>
				 					<div>{{ 'Aufgabenserie ' . $batch->seqno }}</div>
				 				</td>
				 				<td>
				 					<div>{{ 'max. ' . $batch->maxscore }}</div>
				 				</td>
				 				<td/>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
			</div>	
			<button  class="btn btn-default" type="submit" onclick="location.href = '{{ url('/batch/create?circle_id=' . $circle->id) }}'"><i class="fa fa-btn fa-plus"></i>Neue Aufgabenserie anlegen </button>
		</div>
	</div>
</div>
@endsection