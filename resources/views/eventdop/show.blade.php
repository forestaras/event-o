@extends('layouts.app')

@section('template_title')
    {{ $eventdop->name ?? 'Show Eventdop' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Eventdop</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('eventdops.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titlesilka:</strong>
                            {{ $eventdop->titlesilka }}
                        </div>
                        <div class="form-group">
                            <strong>Eventid:</strong>
                            {{ $eventdop->eventid }}
                        </div>
                        <div class="form-group">
                            <strong>Text:</strong>
                            {{ $eventdop->text }}
                        </div>
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $eventdop->userid }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
