<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cid') }}
            {{ Form::text('cid', $mopcompetition->cid, ['class' => 'form-control' . ($errors->has('cid') ? ' is-invalid' : ''), 'placeholder' => 'Cid']) }}
            {!! $errors->first('cid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $mopcompetition->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $mopcompetition->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('organizer') }}
            {{ Form::text('organizer', $mopcompetition->organizer, ['class' => 'form-control' . ($errors->has('organizer') ? ' is-invalid' : ''), 'placeholder' => 'Organizer']) }}
            {!! $errors->first('organizer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('homepage') }}
            {{ Form::text('homepage', $mopcompetition->homepage, ['class' => 'form-control' . ($errors->has('homepage') ? ' is-invalid' : ''), 'placeholder' => 'Homepage']) }}
            {!! $errors->first('homepage', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>