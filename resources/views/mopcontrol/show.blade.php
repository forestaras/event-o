@extends('layouts.app')

@section('template_title')
    {{ $mopcontrol->name ?? 'Show Mopcontrol' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mopcontrol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mopcontrols.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $mopcontrol->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mopcontrol->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
