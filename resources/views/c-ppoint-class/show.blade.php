
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} C Ppoint Class</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('c-ppoint-classes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cid:</strong>
                            {{ $cPpointClass->cid }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $cPpointClass->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cod:</strong>
                            {{ $cPpointClass->cod }}
                        </div>
                        <div class="form-group">
                            <strong>Ball:</strong>
                            {{ $cPpointClass->ball }}
                        </div>
                        <div class="form-group">
                            <strong>All:</strong>
                            {{ $cPpointClass->all }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

