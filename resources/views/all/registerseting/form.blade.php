<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('eventid') }}
            {{ Form::text('eventid', $registerseting->eventid, ['class' => 'form-control' . ($errors->has('eventid') ? ' is-invalid' : ''), 'placeholder' => 'Eventid']) }}
            {!! $errors->first('eventid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $registerseting->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('trener') }}
            {{ Form::text('trener', $registerseting->trener, ['class' => 'form-control' . ($errors->has('trener') ? ' is-invalid' : ''), 'placeholder' => 'Trener']) }}
            {!! $errors->first('trener', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('club') }}
            {{ Form::text('club', $registerseting->club, ['class' => 'form-control' . ($errors->has('club') ? ' is-invalid' : ''), 'placeholder' => 'Club']) }}
            {!! $errors->first('club', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obl') }}
            {{ Form::text('obl', $registerseting->obl, ['class' => 'form-control' . ($errors->has('obl') ? ' is-invalid' : ''), 'placeholder' => 'Obl']) }}
            {!! $errors->first('obl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('roz') }}
            {{ Form::text('roz', $registerseting->roz, ['class' => 'form-control' . ($errors->has('roz') ? ' is-invalid' : ''), 'placeholder' => 'Roz']) }}
            {!! $errors->first('roz', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('si') }}
            {{ Form::text('si', $registerseting->si, ['class' => 'form-control' . ($errors->has('si') ? ' is-invalid' : ''), 'placeholder' => 'Si']) }}
            {!! $errors->first('si', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rik') }}
            {{ Form::text('rik', $registerseting->rik, ['class' => 'form-control' . ($errors->has('rik') ? ' is-invalid' : ''), 'placeholder' => 'Rik']) }}
            {!! $errors->first('rik', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grup') }}
            {{ Form::text('grup', $registerseting->grup, ['class' => 'form-control' . ($errors->has('grup') ? ' is-invalid' : ''), 'placeholder' => 'Grup']) }}
            {!! $errors->first('grup', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dni') }}
            {{ Form::text('dni', $registerseting->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datestop') }}
            {{ Form::text('datestop', $registerseting->datestop, ['class' => 'form-control' . ($errors->has('datestop') ? ' is-invalid' : ''), 'placeholder' => 'Datestop']) }}
            {!! $errors->first('datestop', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $registerseting->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>