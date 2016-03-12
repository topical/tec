@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11 col-md-offset-1" class="text-center">
			<div class="alert alert-danger" role="alert">
  				<span class="sr-only">Fehler:</span>
  				<div class="container">
  					<div class="row">
  						<div class="col-md-1" style="vertical-align: middle">
  							<h1>
  							<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
  							</h1>
  						</div>
  						<div class="col-md-10" style="vertical-align: middle">
  							<h1>
  							<strong>FEHLER:</strong> Du bist leider kein Admin und kannst deswegen nicht auf diese Seite zugreifen
  							</h1>
  						</div>
  					</div>
  				</div>
			</div>
		</div>
	</div>
</div>
@endsection
