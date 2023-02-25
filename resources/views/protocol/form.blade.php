<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Організація 1 строка') }}
            {{ Form::text('col1', $protocol->col1, ['class' => 'form-control' . ($errors->has('col1') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('col1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Організація 2 строка') }}
            {{ Form::text('col2', $protocol->col2, ['class' => 'form-control' . ($errors->has('col2') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('col2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Організація 3 строка') }}
            {{ Form::text('col3', $protocol->col3, ['class' => 'form-control' . ($errors->has('col3') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('col3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Назва змагаань 1 строка') }}
            {{ Form::text('name1', $protocol->name1, ['class' => 'form-control' . ($errors->has('name1') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('name1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Назва змагаань 2 строка') }}
            {{ Form::text('name2', $protocol->name2, ['class' => 'form-control' . ($errors->has('name2') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('name2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Назва змагаань 3 строка') }}
            {{ Form::text('name3', $protocol->name3, ['class' => 'form-control' . ($errors->has('name3') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('name3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Дистанція назва(середня,довга,спринт') }}
            {{ Form::text('namedist', $protocol->namedist, ['class' => 'form-control' . ($errors->has('namedist') ? ' is-invalid' : ''), 'placeholder' => '(середня,довга,спринт)']) }}
            {!! $errors->first('namedist', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Дата проведення') }}
            {{ Form::text('inf_data', $protocol->inf_data, ['class' => 'form-control' . ($errors->has('inf_data') ? ' is-invalid' : ''), 'placeholder' => 'дд.мм.рррр']) }}
            {!! $errors->first('inf_data', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Місце проведення') }}
            {{ Form::text('inf_local', $protocol->inf_local, ['class' => 'form-control' . ($errors->has('inf_local') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('inf_local', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Начальник дистанції') }}
            {{ Form::text('nd', $protocol->nd, ['class' => 'form-control' . ($errors->has('nd') ? ' is-invalid' : ''), 'placeholder' => 'Прізвище І.П.']) }}
            {!! $errors->first('nd', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Головний секретар') }}
            {{ Form::text('gse', $protocol->gse, ['class' => 'form-control' . ($errors->has('gse') ? ' is-invalid' : ''), 'placeholder' => 'Прізвище І.П.']) }}
            {!! $errors->first('gse', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Головний суддя') }}
            {{ Form::text('gsu', $protocol->gsu, ['class' => 'form-control' . ($errors->has('gsu') ? ' is-invalid' : ''), 'placeholder' => 'Прізвище І.П.']) }}
            {!! $errors->first('gsu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Контрольний час') }}
            {{ Form::text('con', $protocol->con, ['class' => 'form-control' . ($errors->has('con') ? ' is-invalid' : ''), 'placeholder' => '1:30:00']) }}
            {!! $errors->first('con', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Клас дистанції для дітей(юнацькі розряди)') }}
            {{ Form::text('cld', $protocol->cld, ['class' => 'form-control' . ($errors->has('cld') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('cld', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Клас дистанції для дорослих(дорослих розрядів)') }}
            {{ Form::text('cldr', $protocol->cldr, ['class' => 'form-control' . ($errors->has('cldr') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('cldr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Підгрузити дані про розряд,тренер,клуб,рік народження якщо в учасника не вказано') }}
            {{-- echo Form::select('size', array('L' => 'Large', 'S' => 'Small')); --}}
            {{ Form::select('dani',array('0' => 'Ні','1' => 'ТАК'), $protocol->dani, ['class' => 'form-control' . ($errors->has('dani') ? ' is-invalid' : '')]) }}
            {{-- {{ Form::text('max', $protocol->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : ''), 'placeholder' => '']) }} --}}
            {!! $errors->first('dani', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Максимальний розряд') }}
            {{-- echo Form::select('size', array('L' => 'Large', 'S' => 'Small')); --}}
            {{ Form::select('max',array('0' => 'виконуються всі розряди','1' => 'КМС','2' => 'І', '3' => 'ІІ', '4' => 'ІІІ', '5' => 'не виконуються дорослі розряди'), $protocol->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : '')]) }}
            {{-- {{ Form::text('max', $protocol->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : ''), 'placeholder' => '']) }} --}}
            {!! $errors->first('max', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Формула') }}
            {{ Form::text('formula', $protocol->formula, ['class' => 'form-control' . ($errors->has('formula') ? ' is-invalid' : ''), 'placeholder' => 'Напишіть будь яку цифрц якщо потрібно щоб рахувало бали']) }}
            {!! $errors->first('formula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Скопіюйте сюди протокол з меоs') }}
            {{ Form::textarea('prot', $protocol->prot, ['class' => 'form-control' . ($errors->has('prot') ? ' is-invalid' : ''), 'placeholder' => 'Вставте протокол']) }}
            {!! $errors->first('prot', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
</div>