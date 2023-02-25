@extends('layouts.app')

@section('template_title')
    {{ $register->name ?? 'Show Register' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Register</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Peopleid:</strong>
                            {{ $register->peopleid }}
                        </div>
                        <div class="form-group">
                            <strong>Eventid:</strong>
                            {{ $register->eventid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $register->name }}
                        </div>
                        <div class="form-group">
                            <strong>Trener:</strong>
                            {{ $register->trener }}
                        </div>
                        <div class="form-group">
                            <strong>Club:</strong>
                            {{ $register->club }}
                        </div>
                        <div class="form-group">
                            <strong>Obl:</strong>
                            {{ $register->obl }}
                        </div>
                        <div class="form-group">
                            <strong>Roz:</strong>
                            {{ $register->roz }}
                        </div>
                        <div class="form-group">
                            <strong>Si:</strong>
                            {{ $register->si }}
                        </div>
                        <div class="form-group">
                            <strong>Rik:</strong>
                            {{ $register->rik }}
                        </div>
                        <div class="form-group">
                            <strong>Grup:</strong>
                            {{ $register->grup }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $register->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Datestop:</strong>
                            {{ $register->datestop }}
                        </div>
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $register->userid }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
