<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $reclam->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('oblid') }}
            {{ Form::text('oblid', $reclam->oblid, ['class' => 'form-control' . ($errors->has('oblid') ? ' is-invalid' : ''), 'placeholder' => 'Oblid']) }}
            {!! $errors->first('oblid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activ') }}
            {{ Form::text('activ', $reclam->activ, ['class' => 'form-control' . ($errors->has('activ') ? ' is-invalid' : ''), 'placeholder' => 'Activ']) }}
            {!! $errors->first('activ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('data_finish') }}
            {{ Form::text('data_finish', $reclam->data_finish, ['class' => 'form-control' . ($errors->has('data_finish') ? ' is-invalid' : ''), 'placeholder' => 'Data Finish']) }}
            {!! $errors->first('data_finish', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('img') }}
            {{ Form::text('img', $reclam->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Img']) }}
            {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('text') }}
            {{ Form::text('text', $reclam->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>