@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nutzer &auml;ndern</div>
                <div class="panel-body">
                    {{ Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT']) }}
                    	<div class="form-group {{ $errors-> has ('name') ? ' has-error' : '' }} ">
                    		{{ Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::text('name', null, array('class' => 'form-control')) }}
                    			@if ($errors->has('name'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('name') }}</strong>
                    				</span>
                    			@endif
                    		</div>
                    	</div>
                  		<div class="form-group {{ $errors-> has ('email') ? ' has-error' : '' }} ">
                    		{{ Form::label('email', 'E-Mail Adresse', ['class' => 'col-md-4 control-label']) }}
                    		<div class="col-md-6">
                    			{{ Form::email('email', null, array('class' => 'form-control')) }}
                    			@if ($errors->has('street'))
                    				<span class="help-block">
                    			 		<strong>{{ $errors->first('email') }}</strong>
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
                    	<div class="form-group ">
                    		<div class="col-md-6 col-md-offset-4">
                    			<button class="btn btn-success" type="submit">
                    			<i class="fa fa-btn fa-floppy-o"></i>Speichern</button>
                    		</div>
                    	</div>
					{{ Form::close() }}
				</div>
			</div>
        	<div class="panel panel-default">
        		<div class="panel-heading">Nutzer l&ouml;schen</div>
            	<div class="panel-body">
                	<div class="text-center">
                 		{{ Form::model($user, ['route' => ['user.destroy', $user->id], 'class' => 'formhorizontal', 'method' => 'DELETE']) }}
                 		<button class="btn btn-danger" type="submit">Nutzer l&ouml;schen</button>
                 		{{ Form::close() }}
                 	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
