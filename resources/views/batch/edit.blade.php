@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form role="form" method="post" action="{{ url('/batch/' . $batch->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $circle->subject->name . ' ' . $circle->grade . ' Aufgabenserie ' . $batch->seqno }}
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label" for="maxscore">Maximalpunktzahl</label>
							<input class="form-control" type="number" name="maxscore" value="{{ $maxscore }}">
						</div>
					</div>	
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table">
							@foreach ($pupils as $pupil)
								<tr>
									<td>
										{{ $pupil->firstname . ' ' . $pupil->surname }}
									</td>
									<td>
										<input class="form-control" type="number" 
											name="{{ 'scores[' . $pupil->id . ']' }}" 
											value="{{ isset($scores[$pupil->id]) ?  $scores[$pupil->id] : '' }}">
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
				<button class="btn btn-success" type="submit"><i class="fa fa-btn fa-floppy-o"></i>Speichern</button>
			</form>
		</div>
	</div>
</div>
@endsection