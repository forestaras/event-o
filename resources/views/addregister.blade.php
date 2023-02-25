<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')

@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Реєстрація </div>
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath("add-save")}}'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class='form-group'>
          <label>Прізвище Імя</label>
          <input type='text' name='name' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Команда</label>
          <input type='text' name='club' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Область</label>
          <input type='text' name='obl' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Тренер</label>
          <input type='text' name='tren' required class='form-control'/>
        </div>
        <div class='form-group'>
          <label>Тренер</label>
          <input type='text' name='eventid' value="{{$registerseting->id}}" required class='form-control'/>
        </div>
         
    
      <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
       </div>
      </form> 
       
    </div>


@include('site.tableregister')

<!-- ADD A PAGINATION -->

  </div>
@endsection
