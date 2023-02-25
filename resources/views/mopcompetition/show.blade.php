@extends('layouts.app')

@section('template_title')
    {{ $mopcompetition->name ?? 'Show Mopcompetition' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mopcompetition</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mopcompetitions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $mopcompetition->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mopcompetition->name }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $mopcompetition->date }}
                        </div>
                        <div class="form-group">
                            <strong>Organizer:</strong>
                            {{ $mopcompetition->organizer }}
                        </div>
                        <div class="form-group">
                            <strong>Homepage:</strong>
                            {{ $mopcompetition->homepage }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
