@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Aufgaben f&uuml;r {{ $circle->subject->name . ' ' . $circle->grade }} </div>

				<table class = "table table-hover">
				 	<tbody>
				 		@foreach ($batches as $batch)
				 			<tr onclick="$(location).attr('href', '{{ url('/batch/' . $batch->id . '/edit') }}');">
				 				<td>
				 					<div>{{ $batch->seqno }}</div>
				 				</td>
				 				<td>
				 					<div>{{ $batch->maxscore }}</div>
				 				</td>
				 			</tr>
				 		@endforeach
				 	</tbody>
				</table>
				<div class="panel-heading">
					<a href="{{ url('/batch/create?circle_id=' . $circle->id) }}"> Neuen Brief anlegen</a>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection