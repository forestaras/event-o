@extends('layouts.app')

@section('template_title')
    {{ $registerseting->name ?? 'Show Registerseting' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Registerseting</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registersetings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Eventid:</strong>
                            {{ $registerseting->eventid }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $registerseting->title }}
                        </div>
                        <div class="form-group">
                            <strong>Trener:</strong>
                            {{ $registerseting->trener }}
                        </div>
                        <div class="form-group">
                            <strong>Club:</strong>
                            {{ $registerseting->club }}
                        </div>
                        <div class="form-group">
                            <strong>Obl:</strong>
                            {{ $registerseting->obl }}
                        </div>
                        <div class="form-group">
                            <strong>Roz:</strong>
                            {{ $registerseting->roz }}
                        </div>
                        <div class="form-group">
                            <strong>Si:</strong>
                            {{ $registerseting->si }}
                        </div>
                        <div class="form-group">
                            <strong>Rik:</strong>
                            {{ $registerseting->rik }}
                        </div>
                        <div class="form-group">
                            <strong>Grup:</strong>
                            {{ $registerseting->grup }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $registerseting->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Datestop:</strong>
                            {{ $registerseting->datestop }}
                        </div>
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $registerseting->userid }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
