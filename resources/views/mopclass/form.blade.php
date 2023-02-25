<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cid') }}
            {{ Form::text('cid', $mopclass->cid, ['class' => 'form-control' . ($errors->has('cid') ? ' is-invalid' : ''), 'placeholder' => 'Cid']) }}
            {!! $errors->first('cid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $mopclass->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ord') }}
            {{ Form::text('ord', $mopclass->ord, ['class' => 'form-control' . ($errors->has('ord') ? ' is-invalid' : ''), 'placeholder' => 'Ord']) }}
            {!! $errors->first('ord', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>