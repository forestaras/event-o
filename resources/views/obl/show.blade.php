@extends('layouts.app')

@section('template_title')
    {{ $obl->name ?? 'Show Obl' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Obl</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('obls.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $obl->userid }}
                        </div>
                        <div class="form-group">
                            <strong>Redactorid:</strong>
                            {{ $obl->redactorid }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $obl->title }}
                        </div>
                        <div class="form-group">
                            <strong>Activ:</strong>
                            {{ $obl->activ }}
                        </div>
                        <div class="form-group">
                            <strong>Flag:</strong>
                            {{ $obl->flag }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
