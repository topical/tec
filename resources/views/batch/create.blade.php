@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Neuer Brief</div>
                <div class="panel-body">
                    {{ Form::open(['url' => 'batch', 'class' => 'form-horizontal']) }}
                    {{ Form::hidden('circle_id', $circle->id) }}
 
                    	<div class="form-group {{ $errors-> has ('seqno') ? ' has-error' : '' }} ">
                    		{{ Form::label('seqno', 'Nummer:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::number('seqno', $seqno, ['class' => 'form-control']) }}
                    			@if ($errors->has('seqno'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('seqno') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	
                    	<div class="form-group {{ $errors-> has ('maxscore') ? ' has-error' : '' }} ">
                    		{{ Form::label('maxscore', 'Maximale Punuktzahl:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::number('maxscore', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('maxscore'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('maxscore') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	
                   		<div class="form-group">
                   			<div class="col-md-6 col-md-offset-4">
                   				<button type="submit" class="btn btn-primary">
                   					<i class="fa fa-btn fa-plus"></i>Anlegen
                   				</button>
                   			</div>
                   		</div>
                    {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection