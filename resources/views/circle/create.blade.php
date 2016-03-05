@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Neuer Korrespondenzzirkel</div>
                <div class="panel-body">
                    {{ Form::open(['url' => 'circle', 'class' => 'form-horizontal']) }}
                    	
                    	<div class="form-group {{ $errors-> has ('subject_id') ? ' has-error' : '' }} ">
                    		{{ Form::label('subject_id', 'Fach:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::select('subject_id', $subjectmapping, null, ['class' => 'form-control']) }}
                    			@if ($errors->has('subject_id'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('subject_id') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	
                    	<div class="form-group {{ $errors-> has ('grade') ? ' has-error' : '' }} ">
                    		{{ Form::label('grade', 'Klassenstufe:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::number('grade', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('grade'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('grade') }}</strong>
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