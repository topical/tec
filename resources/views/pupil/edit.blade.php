@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Schule bearbeiten</div>
                <div class="panel-body">
                    {{ Form::model($pupil, ['route' => ['pupil.update', $pupil->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                  		<div class="form-group {{ $errors-> has ('firstname') ? ' has-error' : '' }} ">
                    		{{ Form::label('firstname', 'Vorname:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('firstname', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('firstname'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('firstname') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('surname') ? ' has-error' : '' }} ">
                    		{{ Form::label('surname', 'Nachname:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('surname', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('surname'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('surname') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('grade') ? ' has-error' : '' }} ">
                    		{{ Form::label('grade', 'Klassenstufe:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('street', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('grade'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('grade') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('school') ? ' has-error' : '' }} ">
                    		{{ Form::label('school', 'Schule:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('school', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('school'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('school') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                  		<div class="form-group {{ $errors-> has ('street') ? ' has-error' : '' }} ">
                    		{{ Form::label('street', 'Stra&szlig;e:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('street', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('street'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('street') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('zipcode') ? ' has-error' : '' }} ">
                    		{{ Form::label('zipcode', 'PLZ:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('zipcode', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('zipcode'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('zipcode') }}</strong>
                    			 	</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('zipcode') ? ' has-error' : '' }} ">
                    		{{ Form::label('Town', 'Stadt:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('town', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('town'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('town') }}</strong>
                    			 	</span>
                    			@endif
                    		</div>
                    	</div>
                    	
                   		<div class="form-group">
                   			<div class="col-md-6 col-md-offset-4">
                   				<button type="submit" class="btn btn-primary">
                   					<i class="fa fa-btn fa-floppy-o"></i>Speichern
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
