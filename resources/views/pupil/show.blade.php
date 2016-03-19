@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $pupil->firstname . ' ' . $pupil->surname }}</div>
                <div class="panel-body">
                    {{ $pupil->school->name . ' ' . $pupil->getGrade() . $pupil->letter }}
                    <br/>
                    <strong>Anschrift</strong>
                    <br/>
                    {{ $pupil->street }}
                    <br/>
                    {{ $pupil->zipcode . ' ' . $pupil->town }}
                    <br/>
                    <a class="btn -primary" href="{{ url('/pupil/' . $pupil->id . '/edit') }}">
                    <i class="fa fa-btn fa-edit"></i>Bearbeiten
                    </a>
                </div>
            </div>
            <button class="btn btn-default" type="button" onclick="location.href = '{{ url('/pupil') }}'"><i class="fa fa-arrow-left"></i> Sch&uuml;lerliste</button>
        </div>
    </div>
</div>
@endsection
