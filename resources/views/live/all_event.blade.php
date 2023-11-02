@extends('live.includ.index')
@section('map_site')
<li class="breadcrumb-item">
    <a href="{{ url('/') }}">Головна</a>/
    Онлайн
</li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
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
                                    <th>Організатор</th>
                                    <th>Статус</th>
                                    {{-- <th>Результат</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                @if ($event->online->active)
                                    
                                
                                    <tr>
                                      <td>{{$event->date}}</td>

                                        <td><b><a href="{{route('event_show',$event->online->eventid)}}?g={{$event->cid}}">{{$event->online->name}}</a></b></td>
                                        <td>{{$event->organizer}}</td>
                                        <td><span class="badge {{$event->color}}">
                                          {{$event->status}}</span></td>
                                        {{-- <td>00:25:30</td> --}}
                                        {{-- <td>Стартові/Результати</td> --}}
                                        
                                        <td>@if ($event->online->starovi)    
                                            <a href="{{route('start', $event->cid)}}"><button class="btn btn-primary btn-sm"><b> Стартові</b></button></a>
                                            @endif
                                            <a href="{{route('rezult', $event->cid)}}"><button class="btn btn-primary btn-sm"><b>Результати</b></button></a>
                                            @if ($event->online->split)    
                                            <a href="{{route('split', $event->cid)}}"><button class="btn btn-primary btn-sm"><b> Спліти</b></button></a>
                                            @endif
                                        </td>

                                    </tr>
                                    @endif
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
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
