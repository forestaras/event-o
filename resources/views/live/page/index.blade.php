@extends('live.includ.index')
@section('title')
    ---Головна---Результати
@endsection
@section('page')
    Головна
@endsection

@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/livess/') }}">Головна</a>/</li>
@endsection
@section('content')

    <div class="col-md-9">
        <div class="d-md-flex">
            <div class="table-responsive">
                <div class="card-footer">
                    <form action="{{route('event')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="query" placeholder="Введіть назву змагань"
                                class="form-control">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-warning">Пошук Змагань</button>
                            </span>
                        </div>
                    </form>
                </div>


            </div>

        </div>
        <div class="row content"  style="font-size:1.2em">
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
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><b>LIVE</b></h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button> --}}
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-md-flex">
                    <div class="table-responsive">

                        <table class="table table-striped  m-0">
                            <thead>
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
                                     <a href="{{route('rezult',$online->id)}}"target="blanc" title="Онлайн {{date('d/m/Y',strtotime($online->rez->date))}}"><i class="fas fa-clipboard-list"></i> </a>
                                 @endif
                                 
                                 @endforeach
              
             
             
                                </td>
             
                                </tr>  
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        
                        <!-- /.card-pane-right -->
                      </div>
                      {{-- {!! $events->links() !!} --}}
                <!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
        </div>

        


        
    </div>
@endsection
