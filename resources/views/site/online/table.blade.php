@extends('site.index')
@section('content')

<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Онлайн центр</h2>
        </div>
         
          <div class="row content">
            <div class="col-md-6">
              <a href="?yerstart=2020">@if($_GET['yerastart']=='2020')<b>@endif 2020</b></a>|
              <a href="?yerastart=2021">@if($_GET['yerastart']=='2021')<b>@endif 2021</b></a></div>
            <div class="col-md-6">
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=01">@if($_GET['datastart']=='01')<b>@endif січ</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=02">@if($_GET['datastart']=='02')<b>@endif лют</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=03">@if($_GET['datastart']=='03')<b>@endif бер</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=04">@if($_GET['datastart']=='04')<b>@endif кві</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=05">@if($_GET['datastart']=='05')<b>@endif тра</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=06">@if($_GET['datastart']=='06')<b>@endif чер</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=07">@if($_GET['datastart']=='07')<b>@endif лип</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=08">@if($_GET['datastart']=='08')<b>@endif сер</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=09">@if($_GET['datastart']=='09')<b>@endif вер</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=10">@if($_GET['datastart']=='10')<b>@endif жов</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=11">@if($_GET['datastart']=='11')<b>@endif лис</b></a>|
              <a href="?yerstart={{$_GET['yerstart']}}&datastart=12"> @if($_GET['datastart']=='12')<b>@endif гру</b></a>|
              <a href="?">ВСІ</a>
              
            </div>

            
          </div>
        </br>

        <div class="row content">

          <div class="table-responsive">
            <table id="example" style="width:99%" class="table table-striped table-bordered">
              <thead>
              	<!-- {{$events}} -->
                <tr>
                  <th>Дата</th>
                  <th>Назва</th>
                  <th>Організатор</th> 
                  <th>Результати</th> 

                </tr>
              </thead>
              <tbody>                
                   @foreach ($events as $event)
                <tr>
                   <td>{{$event->date}}</td>
                   <td>{{$event->name}}</td>
                   <td>{{$event->organizer}}</td>
                   <td><a href="/online/startlist/{{$event->cid}}?sort=grup" target="blanc" title="Cтартові">Стартові</a>  <a href="/online/rezult/{{$event->cid}}?sort=grup" target="blanc" title="Результати">Результати</a></td>
                </tr>
                   @endforeach                                   
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    @endsection