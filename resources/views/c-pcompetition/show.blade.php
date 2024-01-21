@extends('layouts.app')

@section('template_title')
    {{ $cPcompetition->name}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} C Pcompetition</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('c-pcompetitions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $cPcompetition->name }}
                        </div>
                        <div class="form-group">
                            <strong>Data:</strong>
                            {{ $cPcompetition->data }}
                        </div>
                        <div class="form-group">
                            <strong>Pass:</strong>
                            {{ $cPcompetition->pass }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('c-pclass.index')
        @include('c-ppoint-class.index')
    </section>
@endsection
