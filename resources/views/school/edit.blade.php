@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Schule bearbeiten</div>
                <div class="panel-body">
                    {{ Form::model($school, ['route' => ['school.update', $school->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                    	<div class="form-group {{ $errors-> has ('name') ? ' has-error' : '' }} ">
                    		{{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('name', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('name'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('name') }}</strong>
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
                   				<button type="submit" class="btn btn-success">
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
