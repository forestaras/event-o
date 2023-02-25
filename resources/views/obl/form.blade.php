<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $obl->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('redactorid') }}
            {{ Form::text('redactorid', $obl->redactorid, ['class' => 'form-control' . ($errors->has('redactorid') ? ' is-invalid' : ''), 'placeholder' => 'Redactorid']) }}
            {!! $errors->first('redactorid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $obl->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activ') }}
            {{ Form::text('activ', $obl->activ, ['class' => 'form-control' . ($errors->has('activ') ? ' is-invalid' : ''), 'placeholder' => 'Activ']) }}
            {!! $errors->first('activ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('flag') }}
            {{ Form::text('flag', $obl->flag, ['class' => 'form-control' . ($errors->has('flag') ? ' is-invalid' : ''), 'placeholder' => 'Flag']) }}
            {!! $errors->first('flag', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>