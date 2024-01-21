<div class="box box-info padding-1">
    <div class="box-body">
        @php
            $cid = $_GET['cid'];
        @endphp

        <div class="form-group">
            {{ Form::label('cid') }}
            {{ Form::text('cid', $cid, ['class' => 'form-control' . ($errors->has('cid') ? ' is-invalid' : ''), 'placeholder' => 'Cid']) }}
            {!! $errors->first('cid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $cPpointClass->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cod') }}
            {{ Form::text('cod', $cPpointClass->cod, ['class' => 'form-control' . ($errors->has('cod') ? ' is-invalid' : ''), 'placeholder' => 'Cod']) }}
            {!! $errors->first('cod', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ball') }}
            {{ Form::text('ball', $cPpointClass->ball, ['class' => 'form-control' . ($errors->has('ball') ? ' is-invalid' : ''), 'placeholder' => 'Ball']) }}
            {!! $errors->first('ball', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('all') }}
            {{ Form::text('all', $cPpointClass->all, ['class' => 'form-control' . ($errors->has('all') ? ' is-invalid' : ''), 'placeholder' => 'All']) }}
            {!! $errors->first('all', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
