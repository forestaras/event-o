<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $club->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('redactorid') }}
            {{ Form::text('redactorid', $club->redactorid, ['class' => 'form-control' . ($errors->has('redactorid') ? ' is-invalid' : ''), 'placeholder' => 'Redactorid']) }}
            {!! $errors->first('redactorid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('oblid') }}
            {{ Form::text('oblid', $club->oblid, ['class' => 'form-control' . ($errors->has('oblid') ? ' is-invalid' : ''), 'placeholder' => 'Oblid']) }}
            {!! $errors->first('oblid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $club->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bigtitle') }}
            {{ Form::text('bigtitle', $club->bigtitle, ['class' => 'form-control' . ($errors->has('bigtitle') ? ' is-invalid' : ''), 'placeholder' => 'Bigtitle']) }}
            {!! $errors->first('bigtitle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activ') }}
            {{ Form::text('activ', $club->activ, ['class' => 'form-control' . ($errors->has('activ') ? ' is-invalid' : ''), 'placeholder' => 'Activ']) }}
            {!! $errors->first('activ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('logo') }}
            {{ Form::text('logo', $club->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>