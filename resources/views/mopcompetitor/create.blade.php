@extends('layouts.app')

@section('template_title')
    Create Mopcompetitor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Mopcompetitor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mopcompetitors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('mopcompetitor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
