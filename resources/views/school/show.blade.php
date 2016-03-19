@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $school->name }}</div>
                <div class="panel-body">
                    <strong>Anschrift</strong>
                    <br/>
                    {{ $school->street }}
                    <br/>
                    {{ $school->zipcode . ' ' . $school->town }}
                    <br/>
                    {{ Form::open(['method' => 'delete', 'action' => ['SchoolController@destroy', $school->id]]) }}
                    <button class="btn btn-default" type="button" onclick="location.href = '{{ url('/school/' . $school->id . '/edit') }}'">
                    	<i class="fa fa-btn fa-edit"></i>Bearbeiten
                    </button>
                    <button type="submit" class="btn pull-right">L&ouml;schen</button>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-default">
            	<div class="panel-heading">Aktive Teilnehmer</div>
            	<div class="panel-body">
            		<table class="table">
            			@foreach ($registrations as $registration)
            				<tr>
            					<td/>
            					<td>
            						{{ $registration->firstname . ' ' . $registration->surname . ', ' . App\Pupil::enrolmentToGrade($registration->schoolenrolment) . $registration->letter }}
            					</td>
            					<td>
            						{{ $registration->name . ' ' . $registration->grade }}
            					</td>
            					<td/>
            				</tr>
            			@endforeach
            		</table>
            	</div>
           				 
           </div>
           <button class="btn btn-default" type="submit" onclick="location.href = '{{ url('/school') }}'"><i class="fa fa-arrow-left"></i> zur&uuml;ck</button>
		</div>
     </div>
    </div>
    </div>
</div>
@endsection
