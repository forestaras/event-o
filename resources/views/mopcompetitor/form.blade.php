<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cid') }}
            {{ Form::text('cid', $mopcompetitor->cid, ['class' => 'form-control' . ($errors->has('cid') ? ' is-invalid' : ''), 'placeholder' => 'Cid']) }}
            {!! $errors->first('cid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $mopcompetitor->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('org') }}
            {{ Form::text('org', $mopcompetitor->org, ['class' => 'form-control' . ($errors->has('org') ? ' is-invalid' : ''), 'placeholder' => 'Org']) }}
            {!! $errors->first('org', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cls') }}
            {{ Form::text('cls', $mopcompetitor->cls, ['class' => 'form-control' . ($errors->has('cls') ? ' is-invalid' : ''), 'placeholder' => 'Cls']) }}
            {!! $errors->first('cls', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stat') }}
            {{ Form::text('stat', $mopcompetitor->stat, ['class' => 'form-control' . ($errors->has('stat') ? ' is-invalid' : ''), 'placeholder' => 'Stat']) }}
            {!! $errors->first('stat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('st') }}
            {{ Form::text('st', $mopcompetitor->st, ['class' => 'form-control' . ($errors->has('st') ? ' is-invalid' : ''), 'placeholder' => 'St']) }}
            {!! $errors->first('st', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rt') }}
            {{ Form::text('rt', $mopcompetitor->rt, ['class' => 'form-control' . ($errors->has('rt') ? ' is-invalid' : ''), 'placeholder' => 'Rt']) }}
            {!! $errors->first('rt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tstat') }}
            {{ Form::text('tstat', $mopcompetitor->tstat, ['class' => 'form-control' . ($errors->has('tstat') ? ' is-invalid' : ''), 'placeholder' => 'Tstat']) }}
            {!! $errors->first('tstat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('it') }}
            {{ Form::text('it', $mopcompetitor->it, ['class' => 'form-control' . ($errors->has('it') ? ' is-invalid' : ''), 'placeholder' => 'It']) }}
            {!! $errors->first('it', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>