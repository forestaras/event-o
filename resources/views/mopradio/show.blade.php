@extends('layouts.app')

@section('template_title')
    {{ $mopradio->name ?? 'Show Mopradio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mopradio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mopradios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $mopradio->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Ctrl:</strong>
                            {{ $mopradio->ctrl }}
                        </div>
                        <div class="form-group">
                            <strong>Rt:</strong>
                            {{ $mopradio->rt }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
