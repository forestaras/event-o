@extends('layouts.app')

@section('template_title')
    {{ $event->name ?? 'Show Event' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Event</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $event->userid }}
                        </div>
                        <div class="form-group">
                            <strong>Redactorid:</strong>
                            {{ $event->redactorid }}
                        </div>
                        <div class="form-group">
                            <strong>Secretarid:</strong>
                            {{ $event->secretarid }}
                        </div>
                        <div class="form-group">
                            <strong>Golsudid:</strong>
                            {{ $event->golsudid }}
                        </div>
                        <div class="form-group">
                            <strong>Clubid:</strong>
                            {{ $event->clubid }}
                        </div>
                        <div class="form-group">
                            <strong>Oblid:</strong>
                            {{ $event->oblid }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $event->title }}
                        </div>
                        <div class="form-group">
                            <strong>Text:</strong>
                            {{ $event->text }}
                        </div>
                        <div class="form-group">
                            <strong>Datastart:</strong>
                            {{ $event->datastart }}
                        </div>
                        <div class="form-group">
                            <strong>Datafinish:</strong>
                            {{ $event->datafinish }}
                        </div>
                        <div class="form-group">
                            <strong>Org:</strong>
                            {{ $event->org }}
                        </div>
                        <div class="form-group">
                            <strong>Activ:</strong>
                            {{ $event->activ }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $event->logo }}
                        </div>
                        <div class="form-group">
                            <strong>Contactid:</strong>
                            {{ $event->contactid }}
                        </div>
                        <div class="form-group">
                            <strong>Bul:</strong>
                            {{ $event->bul }}
                        </div>
                        <div class="form-group">
                            <strong>Rez:</strong>
                            {{ $event->rez }}
                        </div>
                        <div class="form-group">
                            <strong>Inf:</strong>
                            {{ $event->inf }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $event->location }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Name:</strong>
                            {{ $event->contact_name }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Email:</strong>
                            {{ $event->contact_email }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Phone:</strong>
                            {{ $event->contact_phone }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Fb:</strong>
                            {{ $event->contact_fb }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Website:</strong>
                            {{ $event->contact_website }}
                        </div>
                        <div class="form-group">
                            <strong>Stvoreno:</strong>
                            {{ $event->stvoreno }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
