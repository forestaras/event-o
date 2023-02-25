@extends('layouts.app')

@section('template_title')
    {{ $protocol->name ?? 'Show Protocol' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Protocol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('protocols.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Col1:</strong>
                            {{ $protocol->col1 }}
                        </div>
                        <div class="form-group">
                            <strong>Col2:</strong>
                            {{ $protocol->col2 }}
                        </div>
                        <div class="form-group">
                            <strong>Col3:</strong>
                            {{ $protocol->col3 }}
                        </div>
                        <div class="form-group">
                            <strong>Name1:</strong>
                            {{ $protocol->name1 }}
                        </div>
                        <div class="form-group">
                            <strong>Name2:</strong>
                            {{ $protocol->name2 }}
                        </div>
                        <div class="form-group">
                            <strong>Name3:</strong>
                            {{ $protocol->name3 }}
                        </div>
                        <div class="form-group">
                            <strong>Namedist:</strong>
                            {{ $protocol->namedist }}
                        </div>
                        <div class="form-group">
                            <strong>Inf Data:</strong>
                            {{ $protocol->inf_data }}
                        </div>
                        <div class="form-group">
                            <strong>Inf Local:</strong>
                            {{ $protocol->inf_local }}
                        </div>
                        <div class="form-group">
                            <strong>Nd:</strong>
                            {{ $protocol->nd }}
                        </div>
                        <div class="form-group">
                            <strong>Gse:</strong>
                            {{ $protocol->gse }}
                        </div>
                        <div class="form-group">
                            <strong>Gsu:</strong>
                            {{ $protocol->gsu }}
                        </div>
                        <div class="form-group">
                            <strong>Con:</strong>
                            {{ $protocol->con }}
                        </div>
                        <div class="form-group">
                            <strong>Cld:</strong>
                            {{ $protocol->cld }}
                        </div>
                        <div class="form-group">
                            <strong>Cldr:</strong>
                            {{ $protocol->cldr }}
                        </div>
                        <div class="form-group">
                            <strong>Prot:</strong>
                            {{ $protocol->prot }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
