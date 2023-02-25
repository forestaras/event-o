<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cid') }}
            {{ Form::text('cid', $mopradio->cid, ['class' => 'form-control' . ($errors->has('cid') ? ' is-invalid' : ''), 'placeholder' => 'Cid']) }}
            {!! $errors->first('cid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ctrl') }}
            {{ Form::text('ctrl', $mopradio->ctrl, ['class' => 'form-control' . ($errors->has('ctrl') ? ' is-invalid' : ''), 'placeholder' => 'Ctrl']) }}
            {!! $errors->first('ctrl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rt') }}
            {{ Form::text('rt', $mopradio->rt, ['class' => 'form-control' . ($errors->has('rt') ? ' is-invalid' : ''), 'placeholder' => 'Rt']) }}
            {!! $errors->first('rt', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>