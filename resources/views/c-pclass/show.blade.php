@extends('layouts.app')

@section('template_title')
    {{ $cPclass->name ?? "{{ __('Show') C Pclass" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} C Pclass</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('c-pclasses.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $cPclass->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $cPclass->name }}
                        </div>
                        <div class="form-group">
                            <strong>All:</strong>
                            {{ $cPclass->all }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
