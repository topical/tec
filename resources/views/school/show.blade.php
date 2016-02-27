@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $school->name }}</div>
                <div class="panel-body">
                    <strong>Anschrift</strong>
                    <br/>
                    {{ $school->street }}
                    <br/>
                    {{ $school->zipcode . ' ' . $school->town }}
                    <br/>
                    <a class="btn -primary" href="{{ url('/school/' . $school->id . '/edit') }}">
                    <i class="fa fa-btn fa-edit"></i>Bearbeiten
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
