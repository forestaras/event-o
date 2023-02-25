@extends('layouts.app')

@section('template_title')
    {{ $online->name ?? 'Show Online' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Online</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('onlines.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Eventid:</strong>
                            {{ $online->eventid }}
                        </div>
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $online->userid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $online->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cod:</strong>
                            {{ $online->cod }}
                        </div>
                        <div class="form-group">
                            <strong>Starovi:</strong>
                            {{ $online->starovi }}
                        </div>
                        <div class="form-group">
                            <strong>Startovioff:</strong>
                            {{ $online->startovioff }}
                        </div>
                        <div class="form-group">
                            <strong>Rezult:</strong>
                            {{ $online->rezult }}
                        </div>
                        <div class="form-group">
                            <strong>Rezultoff:</strong>
                            {{ $online->rezultoff }}
                        </div>
                        <div class="form-group">
                            <strong>Startclok:</strong>
                            {{ $online->startclok }}
                        </div>
                        <div class="form-group">
                            <strong>Split:</strong>
                            {{ $online->split }}
                        </div>
                        <div class="form-group">
                            <strong>Splitanaliz:</strong>
                            {{ $online->splitanaliz }}
                        </div>
                        <div class="form-group">
                            <strong>Stop:</strong>
                            {{ $online->stop }}
                        </div>
                        <div class="form-group">
                            <strong>Datestart:</strong>
                            {{ $online->datestart }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
