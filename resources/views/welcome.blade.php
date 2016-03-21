@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Herzlich Willkommen</div>

                <div class="panel-body">
                    <p>
                    Mit dieser Webseite k&ouml;nnen Sie:
					<ul>
                    <li>F&auml;cher anlegen</li>
                    <li>Schulen anlegen</li>
                    <li>Sch&uuml;ler zuordnen</li>
					<li>Korrespondenzzirkel anlegen</li>
					<li>Teilnehmer zuweisen</li>
					<li>Korrespondenzen anlegen</li>
					<li>Punkte der einzelnen Teilnehmer eintragen</li>
					</ul> 
					<p>
					Sie k&ouml;nnen jederzeit eine Auswertung der bisher erzielten Punkte erstellen.
					</p>
					<p>
					Zu Beginn eines neuen Schuljahres m&uuml;ssen Sie zuerst rechts oben das Jahr wechseln.
					</p>
                    @can('is-admin')
                    <p>
                    Als Administrator k&ouml;nnen Sie zudem die Nutzer dieser Webseite verwalten.
                    </p>
					@endcan
					<br/>
					<p>
					<b>Viel Spass!</b>
					</p>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
