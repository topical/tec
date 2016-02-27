@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">F&auml;cher</div>
				
				<table class="table table-hover">
					<tbody>
						@foreach ($subjects as $subject)
						<tr onclick="$(location).attr('href', '{{ url('/subject/' . $subject->id . '/edit') }}');">
							<td>
								<div>{{ $subject->name }}</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-heading">
					<a href="{{ url('/subject/create') }}">Neues Fach anlegen</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
