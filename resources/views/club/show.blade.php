@extends('layouts.app')

@section('template_title')
    {{ $club->name ?? 'Show Club' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Club</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clubs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $club->userid }}
                        </div>
                        <div class="form-group">
                            <strong>Redactorid:</strong>
                            {{ $club->redactorid }}
                        </div>
                        <div class="form-group">
                            <strong>Oblid:</strong>
                            {{ $club->oblid }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $club->title }}
                        </div>
                        <div class="form-group">
                            <strong>Bigtitle:</strong>
                            {{ $club->bigtitle }}
                        </div>
                        <div class="form-group">
                            <strong>Activ:</strong>
                            {{ $club->activ }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $club->logo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
