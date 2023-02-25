@extends('layouts.app')

@section('template_title')
    {{ $mopcompetitor->name ?? 'Show Mopcompetitor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mopcompetitor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mopcompetitors.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $mopcompetitor->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mopcompetitor->name }}
                        </div>
                        <div class="form-group">
                            <strong>Org:</strong>
                            {{ $mopcompetitor->org }}
                        </div>
                        <div class="form-group">
                            <strong>Cls:</strong>
                            {{ $mopcompetitor->cls }}
                        </div>
                        <div class="form-group">
                            <strong>Stat:</strong>
                            {{ $mopcompetitor->stat }}
                        </div>
                        <div class="form-group">
                            <strong>St:</strong>
                            {{ $mopcompetitor->st }}
                        </div>
                        <div class="form-group">
                            <strong>Rt:</strong>
                            {{ $mopcompetitor->rt }}
                        </div>
                        <div class="form-group">
                            <strong>Tstat:</strong>
                            {{ $mopcompetitor->tstat }}
                        </div>
                        <div class="form-group">
                            <strong>It:</strong>
                            {{ $mopcompetitor->it }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
