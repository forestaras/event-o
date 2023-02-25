<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')

@section('content')
  <style type="text/css">
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 1px;
    padding-left: 1px;
} 
  </style>
@if($dozvil and !$_GET['clubid'])
      <a class='btn btn-success btn-sm' href='?clubid={{$dozvil}}&registerid={{$registerseting->id}}'>Редагувати заявку клубу</a>
@endif
@if($_GET['clubid'])
      <a class='btn btn-success btn-sm' href='?registerid={{$registerseting->id}}'>Редагувати свою заявку</a>
@endif

  <!-- Your html goes here -->
  <div class='panel panel-default'>

    <div class='panel-heading'>Реєстрація </div> 
    
    <div class='panel-body'>

      @if(!$row->id)
      <form method='post' action='{{CRUDBooster::mainpath("add-save")}}'>
      @endif
      @if($row->id)
       <form method='post' action='{{CRUDBooster::mainpath("edit-save/".$row->id)}}'>
      @endif

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="eventid" id="idevent" value="{{$_GET['registerid']}}">
        <input type="hidden" class="form-control" value="{{$row->id}}" id="id" name='id'>
        <input type="hidden" class="form-control" value="{{$row->userid}}" id="userid" name='userid'>
        <input type="hidden" class="form-control" id="clubid" name='clubid'>
        <input type="hidden" class="form-control" value="{{$row->peopleid}}" id="peopleid" name='peopleid'>

    <div class="form-row">

    <div class="form-group col-md-2">
      <label for="inputCity">Прізвище Імя</label>
      <input  type="text" class="form-control" value="{{$row->name}}" id="searchname" name='name'required {{$readonly}}>
    </div>

    <div class="form-group col-md-2">
      <label for="inputState"> Дата народження</label>
      <input class="form-control" type="date" value="{{$row->rik}}" id="rik" name='rik'required>
    </div>

@if($registerseting->grup)
    <div class="form-group col-md-1">
      <label for="inputState">Група</label>
      <select  class="form-control" id="grup" value="{{$row->grup}}" name='grup'required>
     @foreach($registerseting->grup as $grup)
    
        <!-- <option selected>1-3</option> -->
        <option @if($row->grup==$grup)selected @endif>{{$grup}}</option>
      @endforeach
      </select>
    </div>
@endif

@if($registerseting->roz)
    <div class="form-group col-md-1">
      <label for="inputState">Розряд</label>
      <select  class="form-control" id="roz" value="{{$row->roz}}" name='roz'required>
        @php($rozz=['б/р','3-ю','2-ю','1-ю','III','II','I','КМСУ','МСУ'])
        @foreach($rozz as $roz)
    
        <!-- <option selected>1-3</option> -->
        <option @if($row->roz==$roz)selected @endif>{{$roz}}</option>
      @endforeach
       
      </select>
    </div>
@endif

@if($registerseting->club)
    <div class="form-group col-md-1">
      <label for="inputZip">Клуб {{$row->clubid}}</label>
      <input type="text" class="form-control" id="club" value="{{$row->club}}" name='club'required>
    </div>
@endif

@if($registerseting->obl)
    <div class="form-group col-md-1">
      <label for="inputZip">Область</label>
      <input type="text" class="form-control" id="obl" value="{{$row->obl}}" name='obl'required>
    </div>
@endif

@if($registerseting->trener)
    <div class="form-group col-md-2">
      <label for="inputCity">Тренер</label>
      <input type="text" class="form-control" id="trener" value="{{$row->trener}}" name='trener'required>
    </div>
@endif

@if($registerseting->si)
    <div class="form-group col-md-1">
      <label for="inputCity">Чіп</label>
      <input type="text" class="form-control" id="si"  value="{{$row->si}}" name='si'>
    </div>
@endif

@if($registerseting->dni)
    <div class="form-group col-md-1">
      <label for="inputState">Дні участі</label>     
      <select  class="form-control" id="dni" value="{{$row->dni}}" name='dni'required>
        @foreach($registerseting->dni as $dni)
        <!-- <option selected>1-3</option> -->
        <option @if($row->dni==$dni)selected @endif>{{$dni}}</option>
      @endforeach
      </select>
    </div>
  </div>
@endif

    <div class='panel-footer col-md-12' >
      <input type='submit' class='btn btn-primary' value='Зберегти учасника'/>
      @if ($show =='admin' and $_GET['show'] !='admin')
      <a href="{{$_SERVER['REQUEST_URI']}}&show=admin" class="btn btn-danger" role="button" aria-pressed="true">Редагувати як адміністратор події</a>
      @endif
      @if ($_GET['show'] =='admin')
      <a href="{{$_SERVER['REQUEST_URI']}}&show=user" class="btn btn-danger" role="button" aria-pressed="true">Редагувати як простий користувач</a>
      <a href="/event/registers/exportmeos/{{$registerseting->id}}" class="btn btn-warning" role="button" aria-pressed="true">Експорт учасників в meos</a>

      @endif
      
      
    </div>
</form> 

    </div>

@include('test')
@include('site.tableregister')

<!-- ADD A PAGINATION -->


    
  </div>
@endsection