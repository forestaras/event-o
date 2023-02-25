@extends('layouts.app')

@section('template_title')
    {{ $mopclass->name ?? 'Show Mopclass' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mopclass</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mopclasses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $mopclass->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mopclass->name }}
                        </div>
                        <div class="form-group">
                            <strong>Ord:</strong>
                            {{ $mopclass->ord }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
