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

<div class='panel panel-default'>
  <div class='panel-heading'>Реєстрація </div>    
</div>

@if(!$dani->id)
<form method='post' action='{{CRUDBooster::mainpath("add-save")}}'>
  @endif
  @if($dani->id)
  <form method='post' action='{{CRUDBooster::mainpath("edit-save/".$dani->id)}}'>
    @endif

    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-6" >
          <h2>Інформація</h2>
          <div class="form-group">
            <label for="pwd">Назва змагань*:</label>
            <input type="text" name="title" class="form-control" value="{{$dani->title}}" required>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <input type="hidden" name="userid" class="form-control" value="{{$dani->userid}}" >
          <input type="hidden" name="activ" class="form-control" value="1"> 

          <div class="form-group col-sm-6">
            <label for="pwd">Дата початку*:</label>
            <input type="date" name="datastart" class="form-control" value="{{$dani->datastart}}" required>
          </div>

          <div class="form-group col-sm-6">
            <label for="pwd">Дата закінчення:</label>
            <input type="date" name="datafinish" class="form-control" value="{{$dani->datafinish}}">
          </div>

          <div class="form-group">
            <label for="pwd">Локація*:</label>
            <input type="text" name="location" class="form-control" value="{{$dani->location}}" required>
          </div>

          <div class="form-group">
            <label for="pwd">Область*:</label>
            <input list="brow3" class="form-control" name="oblid" value="{{$obll->title}}" required>
            <datalist id="brow3">
              @foreach($obl as $obltitle)
              <option value="{{$obltitle->title}}">       
                @endforeach 
              </datalist>  
            </div>

            <div class="form-group">
              <label for="pwd">Клуб:</label>
              <input list="brow2" class="form-control" name="clubid" value="{{$clubb->title}}">
              <datalist id="brow2">
                @foreach($club as $clubtitle)
                <option value="{{$clubtitle->title}}">
                  @endforeach 
                </datalist>  
              </div>

              <div class="form-group">
                <label for="pwd">Організатор:</label>
                <input type="text" name="org" class="form-control" value="{{$dani->org}}"> 
              </div>

<!--   <div class="col-sm-10">
         <input type='file' id="logo" title="File Attachment" required   class='form-control' name="logo"/>
         <p class='help-block'></p>
         <div class="text-danger"></div>
       </div> -->


       <div class="form-group">
        <label for="exampleFormControlTextarea1">Короткий опис</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="text" >{{$dani->text}}</textarea>
      </div>
    </div>

    <div class="col-sm-6"> 
     <h3>ГСК</h3>  
     <div class="form-group">
       <label for="pwd">Гловний суддя:</label>
       <input list="brow4" class="form-control" name="golsudid" value="{{$golsud->name}}">
       <datalist id="brow4">
        @foreach($user as $usertitle)
        <option value="{{$usertitle->name}}">
          @endforeach 
        </datalist>  
      </div>

      <div class="form-group">
       <label for="pwd">Секретар:</label>
       <input list="brow5" class="form-control" name="secretarid" value="{{$secretar->name}}">
       <datalist id="brow5">
        @foreach($user as $usertitle)
        <option value="{{$usertitle->name}}">
          @endforeach 
        </datalist> 
      </div>

      <div class="form-group">
       <label for="pwd">Редактор:</label>
       <input list="brow6" class="form-control" name="redactorid" value="{{$redactor->name}}">
       <datalist id="brow6">
        @foreach($user as $usertitle)
        <option value="{{$usertitle->name}}">
          @endforeach 
        </datalist> 
      </div>

      <div class="form-group bg-white">
       <h3>КОНТАКТІ ДАНІ</h3>

       <div class="form-group">
         <label for="pwd">Контактна особа:</label>
         <input type="text" class="form-control" name="contact_name" value="{{$dani->contact_name}}">
       </div>

       <div class="form-group">
         <label for="pwd">Контактний телефон:</label>
         <input type="text" class="form-control" name="contact_phone" value="{{$dani->contact_phone}}"> 
       </div>

       <div class="form-group">
         <label for="pwd">Контактний Email:</label>
         <input type="text" class="form-control" name="contact_email" value="{{$dani->contact_email}}">
       </div>

       <div class="form-group">
         <label for="pwd">Сайт:</label>
         <input type="text" class="form-control" name="contact_website" value="{{$dani->contact_website}}">
       </div>

       <div class="form-group">
         <label for="pwd">facebook:</label>
         <input type="text" class="form-control" name="contact_fb" value="{{$dani->contact_fb}}">
       </div>

     </div>
   </div>
 </div>
</div>
<div class='panel-footer col-md-12' >
  <input type='submit' class='btn btn-primary' value='Зберегти'/>
</div>
</form> 
@endsection