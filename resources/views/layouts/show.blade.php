@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card uper">

  <div class="card-header">
    {{-- <a class="btn btn-primary" href="/rezonline/create/{{$cid}}"> Create New Post</a> --}}
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
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Прізвище Імя</td>
          <td>Група</td>
          <td>Команда</td>
          <td>Старт</td>
          <td>Фініш</td>
          <td>Результат</td>
          <td>Статус</td>
        </tr>
    </thead>
    <tbody>
        @foreach($peoples as $people)
        <tr>
            <td>{{$people->id}}</td>
            <td>{{$people->name}}</td>
            <td>{{$people->grup->name}}</td>
            <td>{{$people->club->name}}</td>
            <td>{{$people->start}}</td>
            <td>{{$people->finish}}</td>
            <td>{{$people->rez}}</td>
            <td>
            @if ($people->stat==1) ОК @endif
            @if ($people->stat==20) DNS @endif
            @if ($people->stat==6) КЧ @endif
            @if ($people->stat==4) DNF @endif
            @if ($people->stat==5) DSQ @endif
                
            </td>
            <td><a href="/rezonline/edit/{{$cid}}/{{$people->id}}" class="btn btn-primary">Edit</a></td>
            <td><a class="btn btn-danger" href="/rezonline/delet/{{$cid}}/{{$people->id}}">DELET</a></td>
            
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection