<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('eventid') }}
            {{ Form::text('eventid', $online->eventid, ['class' => 'form-control' . ($errors->has('eventid') ? ' is-invalid' : ''), 'placeholder' => 'Eventid']) }}
            {!! $errors->first('eventid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $online->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $online->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cod') }}
            {{ Form::text('cod', $online->cod, ['class' => 'form-control' . ($errors->has('cod') ? ' is-invalid' : ''), 'placeholder' => 'Cod']) }}
            {!! $errors->first('cod', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('starovi') }}
            {{ Form::text('starovi', $online->starovi, ['class' => 'form-control' . ($errors->has('starovi') ? ' is-invalid' : ''), 'placeholder' => 'Starovi']) }}
            {!! $errors->first('starovi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('startovioff') }}
            {{ Form::text('startovioff', $online->startovioff, ['class' => 'form-control' . ($errors->has('startovioff') ? ' is-invalid' : ''), 'placeholder' => 'Startovioff']) }}
            {!! $errors->first('startovioff', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rezult') }}
            {{ Form::text('rezult', $online->rezult, ['class' => 'form-control' . ($errors->has('rezult') ? ' is-invalid' : ''), 'placeholder' => 'Rezult']) }}
            {!! $errors->first('rezult', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rezultoff') }}
            {{ Form::text('rezultoff', $online->rezultoff, ['class' => 'form-control' . ($errors->has('rezultoff') ? ' is-invalid' : ''), 'placeholder' => 'Rezultoff']) }}
            {!! $errors->first('rezultoff', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('startclok') }}
            {{ Form::text('startclok', $online->startclok, ['class' => 'form-control' . ($errors->has('startclok') ? ' is-invalid' : ''), 'placeholder' => 'Startclok']) }}
            {!! $errors->first('startclok', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('split') }}
            {{ Form::text('split', $online->split, ['class' => 'form-control' . ($errors->has('split') ? ' is-invalid' : ''), 'placeholder' => 'Split']) }}
            {!! $errors->first('split', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('splitanaliz') }}
            {{ Form::text('splitanaliz', $online->splitanaliz, ['class' => 'form-control' . ($errors->has('splitanaliz') ? ' is-invalid' : ''), 'placeholder' => 'Splitanaliz']) }}
            {!! $errors->first('splitanaliz', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stop') }}
            {{ Form::text('stop', $online->stop, ['class' => 'form-control' . ($errors->has('stop') ? ' is-invalid' : ''), 'placeholder' => 'Stop']) }}
            {!! $errors->first('stop', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datestart') }}
            {{ Form::text('datestart', $online->datestart, ['class' => 'form-control' . ($errors->has('datestart') ? ' is-invalid' : ''), 'placeholder' => 'Datestart']) }}
            {!! $errors->first('datestart', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>