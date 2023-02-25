<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titlesilka') }}
            {{ Form::text('titlesilka', $eventdop->titlesilka, ['class' => 'form-control' . ($errors->has('titlesilka') ? ' is-invalid' : ''), 'placeholder' => 'Titlesilka']) }}
            {!! $errors->first('titlesilka', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('eventid') }}
            {{ Form::text('eventid', $eventdop->eventid, ['class' => 'form-control' . ($errors->has('eventid') ? ' is-invalid' : ''), 'placeholder' => 'Eventid']) }}
            {!! $errors->first('eventid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('text') }}
            {{ Form::text('text', $eventdop->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $eventdop->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>