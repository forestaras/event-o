@extends('layouts.app')

@section('template_title')
    {{ $reclam->name ?? 'Show Reclam' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reclam</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reclams.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $reclam->userid }}
                        </div>
                        <div class="form-group">
                            <strong>Oblid:</strong>
                            {{ $reclam->oblid }}
                        </div>
                        <div class="form-group">
                            <strong>Activ:</strong>
                            {{ $reclam->activ }}
                        </div>
                        <div class="form-group">
                            <strong>Data Finish:</strong>
                            {{ $reclam->data_finish }}
                        </div>
                        <div class="form-group">
                            <strong>Img:</strong>
                            {{ $reclam->img }}
                        </div>
                        <div class="form-group">
                            <strong>Text:</strong>
                            {{ $reclam->text }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
