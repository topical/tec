@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Neuer Nutzer</div>
                <div class="panel-body">
                    {{ Form::open(['url' => 'user', 'class' => 'form-horizontal']) }}
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
                  		<div class="form-group {{ $errors-> has ('email') ? ' has-error' : '' }} ">
                    		{{ Form::label('email', 'E-Mail Adresse:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::email('email', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('email'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('email') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('password') ? ' has-error' : '' }} ">
                    		{{ Form::label('password', 'Passwort:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::password('password', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('password'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('password') }}</strong>
                    			 	</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('password_confirmation') ? ' has-error' : '' }} ">
                    		{{ Form::label('password_confirmation', 'Passwort wiederholen:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
                    			@if ($errors->has('password_confirmation'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('password_confirmation') }}</strong>
                    			 	</span>
                    			@endif
                    		</div>
                    	</div>
                    	<div class="form-group {{ $errors-> has ('admin') ? ' has-error' : '' }} ">
                    		<div class="col-md-6 col-md-offset-4">
                    			<div class="checkbox">
                    				<label>
                    					{{ Form::checkbox('admin') }}
                    					ist ein Administrator
                    				</label>
                    			</div>
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