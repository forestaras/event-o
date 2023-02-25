@extends('layouts.app')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create Post
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('rezonline.store') }}">
          <div class="form-group">
              @csrf
              <input type="cid" class="form-control" name="cid" id="cid" value="{{$cid}}" />
              <label for="title">Прізвище Імя:</label>
              <input type="text" class="form-control" name="name" id="name" />
          </div>
          <div class="form-group">
            <label for="title">Команда клуб:</label>
            <input type="text" class="form-control" name="club" id="club" />
        </div>
        <div class="form-group">
            <label for="sel1">Група:</label>
            <select class="form-control" id="sel1" name="grup">
                @foreach ($grups as $grup)
                    <option>{{$grup->name}}</option>
                @endforeach

            </select>
          </div>
          <div class="form-group">
            <label for="pwd">Старт</label>
            <input type="text" class="form-control" id="start" placeholder="00 00 00" name="start">
          </div>
          <div class="form-group">
            <label for="pwd">Фініш</label>
            <input type="text" class="form-control" id="finish" placeholder="00 00 00" name="finish">
          </div>
          <div class="form-group">
            <label for="sel1">Статус:</label>
            <select class="form-control" id="sel1" name="stat">
              
                    <option value="1">ОК</option>
                    <option value="20">DNS</option>
                    <option value="5">DSQ</option>
                    <option value="4">DNF</option>
                    <option value="6">КЧ</option>
            

            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
@endsection