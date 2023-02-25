@extends('layouts.app')

@section('template_title')
    {{ $moporganization->name ?? 'Show Moporganization' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Moporganization</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('moporganizations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $moporganization->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $moporganization->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
