@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	{{ 'Auswertung ' . $circle->subject->name . ' Klassenstufe ' . $circle->grade }}
                </div>
                <div class="panel-body">
                	<table class="table">
                		<thead>
                			<tr>
                				<th>Sch&uuml;ler</th>
                				@foreach($batches as $batch)
                					<th>{{ $batch->seqno . ' (' . $batch->maxscore . ')' }}</th>
                				@endforeach
                				<th>{{ 'Gesamt (' . $maxtotal . ')'}}</th>
                			</tr>
                		</thead>
                		<tbody>
                			@foreach($pupils as $pupil)
                				<tr>
                					<td>{{ $pupil->firstname . ' ' . $pupil->surname }}</td>
                					@foreach($batches as $batch)
                						<td>{{ isset($scores[$pupil->id][$batch->id]) ? $scores[$pupil->id][$batch->id] : '' }}</td>
                					@endforeach 
                					<td>
                					@if( isset($totals[$pupil->id]))
                						{{ $totals[$pupil->id] . ' (' . number_format( $totals[$pupil->id] / $maxtotal * 100, 0) . '%)' }}
                					@endif
                					</td>
                				</tr>
                			@endforeach
                		</tbody> 
                	</table>   
                </div>
            </div>
            <button class="btn btn-default" onclick="location.href = '{{ url('/batch?circle_id=' . $circle->id) }}'"><i class="fa fa-list"></i> Aufgaben verwalten</button>
        </div>
    </div>
</div>
@endsection