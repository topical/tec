@extends('layouts.app')

@section('content')
<div class="container">
    <form role="form" action="{{ url('/schoolyear') }}" method="post">
    	{{ csrf_field() }}
    	<h1>Schuljahr wechseln</h1>
    	@foreach( range($year - 2, $year + 2) as $currentyear )
    		<button class="btn btn-lg center-block" type="submit" name="year" value="{{ $currentyear }}">
    			{{ $currentyear . '/' . ($currentyear + 1) }}
    		</button>
    		<br/>  		
    	@endforeach
    </form>
</div>
@endsection
