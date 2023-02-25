<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('userid') }}
            {{ Form::text('userid', $event->userid, ['class' => 'form-control' . ($errors->has('userid') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('redactorid') }}
            {{ Form::text('redactorid', $event->redactorid, ['class' => 'form-control' . ($errors->has('redactorid') ? ' is-invalid' : ''), 'placeholder' => 'Redactorid']) }}
            {!! $errors->first('redactorid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('secretarid') }}
            {{ Form::text('secretarid', $event->secretarid, ['class' => 'form-control' . ($errors->has('secretarid') ? ' is-invalid' : ''), 'placeholder' => 'Secretarid']) }}
            {!! $errors->first('secretarid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('golsudid') }}
            {{ Form::text('golsudid', $event->golsudid, ['class' => 'form-control' . ($errors->has('golsudid') ? ' is-invalid' : ''), 'placeholder' => 'Golsudid']) }}
            {!! $errors->first('golsudid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clubid') }}
            {{ Form::text('clubid', $event->clubid, ['class' => 'form-control' . ($errors->has('clubid') ? ' is-invalid' : ''), 'placeholder' => 'Clubid']) }}
            {!! $errors->first('clubid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('oblid') }}
            {{ Form::text('oblid', $event->oblid, ['class' => 'form-control' . ($errors->has('oblid') ? ' is-invalid' : ''), 'placeholder' => 'Oblid']) }}
            {!! $errors->first('oblid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $event->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('text') }}
            {{ Form::text('text', $event->text, ['class' => 'form-control' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datastart') }}
            {{ Form::text('datastart', $event->datastart, ['class' => 'form-control' . ($errors->has('datastart') ? ' is-invalid' : ''), 'placeholder' => 'Datastart']) }}
            {!! $errors->first('datastart', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datafinish') }}
            {{ Form::text('datafinish', $event->datafinish, ['class' => 'form-control' . ($errors->has('datafinish') ? ' is-invalid' : ''), 'placeholder' => 'Datafinish']) }}
            {!! $errors->first('datafinish', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('org') }}
            {{ Form::text('org', $event->org, ['class' => 'form-control' . ($errors->has('org') ? ' is-invalid' : ''), 'placeholder' => 'Org']) }}
            {!! $errors->first('org', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activ') }}
            {{ Form::text('activ', $event->activ, ['class' => 'form-control' . ($errors->has('activ') ? ' is-invalid' : ''), 'placeholder' => 'Activ']) }}
            {!! $errors->first('activ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('logo') }}
            {{ Form::text('logo', $event->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contactid') }}
            {{ Form::text('contactid', $event->contactid, ['class' => 'form-control' . ($errors->has('contactid') ? ' is-invalid' : ''), 'placeholder' => 'Contactid']) }}
            {!! $errors->first('contactid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bul') }}
            {{ Form::text('bul', $event->bul, ['class' => 'form-control' . ($errors->has('bul') ? ' is-invalid' : ''), 'placeholder' => 'Bul']) }}
            {!! $errors->first('bul', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rez') }}
            {{ Form::text('rez', $event->rez, ['class' => 'form-control' . ($errors->has('rez') ? ' is-invalid' : ''), 'placeholder' => 'Rez']) }}
            {!! $errors->first('rez', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inf') }}
            {{ Form::text('inf', $event->inf, ['class' => 'form-control' . ($errors->has('inf') ? ' is-invalid' : ''), 'placeholder' => 'Inf']) }}
            {!! $errors->first('inf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::text('location', $event->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_name') }}
            {{ Form::text('contact_name', $event->contact_name, ['class' => 'form-control' . ($errors->has('contact_name') ? ' is-invalid' : ''), 'placeholder' => 'Contact Name']) }}
            {!! $errors->first('contact_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_email') }}
            {{ Form::text('contact_email', $event->contact_email, ['class' => 'form-control' . ($errors->has('contact_email') ? ' is-invalid' : ''), 'placeholder' => 'Contact Email']) }}
            {!! $errors->first('contact_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_phone') }}
            {{ Form::text('contact_phone', $event->contact_phone, ['class' => 'form-control' . ($errors->has('contact_phone') ? ' is-invalid' : ''), 'placeholder' => 'Contact Phone']) }}
            {!! $errors->first('contact_phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_fb') }}
            {{ Form::text('contact_fb', $event->contact_fb, ['class' => 'form-control' . ($errors->has('contact_fb') ? ' is-invalid' : ''), 'placeholder' => 'Contact Fb']) }}
            {!! $errors->first('contact_fb', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_website') }}
            {{ Form::text('contact_website', $event->contact_website, ['class' => 'form-control' . ($errors->has('contact_website') ? ' is-invalid' : ''), 'placeholder' => 'Contact Website']) }}
            {!! $errors->first('contact_website', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stvoreno') }}
            {{ Form::text('stvoreno', $event->stvoreno, ['class' => 'form-control' . ($errors->has('stvoreno') ? ' is-invalid' : ''), 'placeholder' => 'Stvoreno']) }}
            {!! $errors->first('stvoreno', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>