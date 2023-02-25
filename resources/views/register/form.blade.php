<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('peopleid') }}
            {{ Form::text('peopleid', $register->peopleid, ['class' => 'form-control' . ($errors->has('peopleid') ? ' is-invalid' : ''), 'placeholder' => 'Peopleid']) }}
            {!! $errors->first('peopleid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('eventid') }}
            {{ Form::text('eventid', $register->eventid, ['class' => 'form-control' . ($errors->has('eventid') ? ' is-invalid' : ''), 'placeholder' => 'Eventid']) }}
            {!! $errors->first('eventid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $register->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('trener') }}
            {{ Form::text('trener', $register->trener, ['class' => 'form-control' . ($errors->has('trener') ? ' is-invalid' : ''), 'placeholder' => 'Trener']) }}
            {!! $errors->first('trener', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('club') }}
            {{ Form::text('club', $register->club, ['class' => 'form-control' . ($errors->has('club') ? ' is-invalid' : ''), 'placeholder' => 'Club']) }}
            {!! $errors->first('club', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obl') }}
            {{ Form::text('obl', $register->obl, ['class' => 'form-control' . ($errors->has('obl') ? ' is-invalid' : ''), 'placeholder' => 'Obl']) }}
            {!! $errors->first('obl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('roz') }}
            {{ Form::text('roz', $register->roz, ['class' => 'form-control' . ($errors->has('roz') ? ' is-invalid' : ''), 'placeholder' => 'Roz']) }}
            {!! $errors->first('roz', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('si') }}
            {{ Form::text('si', $register->si, ['class' => 'form-control' . ($errors->has('si') ? ' is-invalid' : ''), 'placeholder' => 'Si']) }}
            {!! $errors->first('si', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rik') }}
            {{ Form::text('rik', $register->rik, ['class' => 'form-control' . ($errors->has('rik') ? ' is-invalid' : ''), 'placeholder' => 'Rik']) }}
            {!! $errors->first('rik', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grup') }}
            {{ Form::text('grup', $register->grup, ['class' => 'form-control' . ($errors->has('grup') ? ' is-invalid' : ''), 'placeholder' => 'Grup']) }}
            {!! $errors->first('grup', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dni') }}
            {{ Form::text('dni', $register->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datestop') }}
            {{ Form::text('datestop', $register->datestop, ['class' => 'form-control' . ($errors->has('datestop') ? ' is-invalid' : ''), 'placeholder' => 'Datestop']) }}
            {!! $errors->first('datestop', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $register->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>