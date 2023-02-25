<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')

@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <div class="box-body">
            @if (!$dani->id)
                <form method='post' action='{{ CRUDBooster::mainpath('add-save') }}'>
            @endif
            @if ($dani->id)
                <form method='post' action='{{ CRUDBooster::mainpath('edit-save/' . $dani->id) }}'>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <input type="hidden" name="userid" class="form-control" value="{{$dani->userid}}" >
            <div class="form-group">
                <label>Назва реєстрації</label>
                <input type="text" name="title"  value="{{$dani->title}}" required class="form-control" placeholder="назва">
            </div>
            <div class="form-group">
                <label>Вкажть дату та час зупинки прийому заявок</label>
                <div class="row">
                    <div class=" col-sm-2 form-group">
                        <input type="date" name="date"  value="{{$dani->date}}" required class="form-control">
                    </div>
                    <div class=" col-sm-2 form-group">
                        <input type="time" name="time"  value="{{$dani->time}}" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Тип заявки</label>
                <select class="form-control">
                    <option>Стандарт(особисті)</option>
                    {{-- <option>Естафета</option> --}}
                </select>
            </div>
            <div class="form-group">
                <label>Виберіть поля які потрібно відображати</label>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="club" @if($dani->club) checked @endif>
                            Клуб
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="obl" @if($dani->obl) checked @endif>
                            Область
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="trener" @if($dani->trener) checked @endif>
                            Тренер
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="rik" @if($dani->rik) checked @endif>
                            Рік народження
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="si" @if($dani->si) checked @endif>
                            SI
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="roz" @if($dani->roz) checked @endif>
                            Розряд
                        </label>
                    </div>


                </div>
            </div>
            <div class="form-group">
                <label>Вкажіть групи які потрібні для реєстрації(групи потрібно вказувати через пробіл)</label>
                <textarea class="form-control" name="grup"  value="{{$dani->grup}}" required rows="2" placeholder="Ч-12 Ч-14 Ч-16 Ж-12..."></textarea>
            </div>
            <div class="form-group">
                <label>Вкажіть дні учвсті у змаганнях (як роздільник використовуйте пробіл)</label>
                <textarea class="form-control" name="dni"  value="{{$dani->dni}}" required rows="2" placeholder="1-3 1,2 2,3 1,3 1 2 3"></textarea>
            </div>
            <div class='panel-footer col-md-12'>
                <input type='submit' class='btn btn-primary' value='Зберегти' />
            </div>




            </form>
        </div>
    </div>
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>

        <div class="box-body">
            <form role="form">

                <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                    <label>Text Disabled</label>
                    <input type="text" class="form-control" placeholder="Enter ..." disabled="">
                </div>

                <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label>Textarea Disabled</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." disabled=""></textarea>
                </div>

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with
                        success</label>
                    <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                    <span class="help-block">Help block with success</span>
                </div>
                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Input with
                        warning</label>
                    <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                    <span class="help-block">Help block with warning</span>
                </div>
                <div class="form-group has-error">
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                        error</label>
                    <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
                    <span class="help-block">Help block with error</span>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Checkbox 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Checkbox 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" disabled="">
                            Checkbox disabled
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                checked="">
                            Option one is this and that—be sure to include why it's great
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"
                                disabled="">
                            Option three is disabled
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Disabled</label>
                    <select class="form-control" disabled="">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Multiple</label>
                    <select multiple="" class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Multiple Disabled</label>
                    <select multiple="" class="form-control" disabled="">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>
                </div>
            </form>
        </div>

    </div>
@endsection
