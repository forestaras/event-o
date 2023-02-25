@extends('site.index')
@section('content')

<section id="about" class="about">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title">
          <h2>Календар</h2>
        </div>
         
          <div class="row content"  style="font-size:0.7em">
            <div class="col-md-6">
              <a href="?yerstart=2021">@if($_GET['yerstart']=='2021')<b>@endif 2021</b></a>|
              <a href="?yerstart=2022">@if($_GET['yerstart']=='2022')<b>@endif 2022</b></a>|
              <a href="?yerstart=2023">@if($_GET['yerstart']=='2023')<b>@endif 2023</b></a></div>
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
              <a href="?filter=all">ВСІ</a>             
            </div>

            
          </div>
        </br>
       

          <div class="table-responsive  " >
          
            <table id="example" class="table table-striped table-bordered" style="width:99%;font-size:0.7em">
              <thead>
              	<!-- {{$events}} -->
                <tr>
                  <th>Дата</th>
                  <th>Назва</th>
                  <div><th>Локація</th>
                  <th class="d-md-none d-lg-block">Організатор</th></div>          
                  <th>Область</th>
                  <th>Більше</th>
                </tr>
              </thead>
              <tbody>                
                   @foreach ($events as $event)
                   <tr>

                    <td style="width:8em">{{$event->data}}</td>
                   
                   <td><a href="/event/{{$event->id}}">{{$event->title}}</a></td>      
                   <td>{{$event->location}}</td>
                   <td class="d-md-none d-lg-block">{{$event->org}}</td>
                   <td class="text-center">{{$event->obltitle}} <img src="/{{$event->logoobl}}"   height="15px"></td>
                   <td>
                   	@if ($event->bul!==NULL)
                   	<a href="{{$event->bul}}" target="blanc" title="Бюлетень"><i class="fas fa-globe fa-1x"></i> </a>
                    @endif
                    @if ($event->inf!==NULL)
                    <a href="{{$event->inf}}" target="blanc" title="Інформація"><i class="fas fa-info fa-1x"></i> </a>
                    @endif
                    @if ($event->rez!==NULL)
                    <a href="{{$event->rez}}"target="blanc" title="Резул ати"><i class="fas fa-th-list fa-1x"></i> </a>
                    @endif
                    @foreach ($event->registersetings as $registerseting)
                    {{-- @if ()
                        
                    @endif --}}
                    <a href="/event/register/{{$registerseting->id}}"target="blanc" color="red" title="Реєстрація {{$registerseting->title}}">
                        
                    <span @if (date('U',strtotime($registerseting->datestop))>date('U')) style="color: #33FF36;" @endif><i class="fas fa-running"></i></span></a>
                    @endforeach
                    @foreach ($event->online as $online)
                    @if ($online->rez>0)
                        <a href="/online/rezult/{{$online->id}}?sort=grup"target="blanc" title="Онлайн {{date('d/m/Y',strtotime($online->rez->date))}}"><i class="fas fa-clipboard-list"></i> </a>
                    @endif
                    
                    @endforeach
 


                   </td>

                   </tr>  
                   @endforeach                                   
              </tbody>
            </table>
          </div>
          
        </div>
     
    </section>
    @endsection