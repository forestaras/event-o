@extends('live.includ.index')
@section('map_site')
<li class="breadcrumb-item">головна</li>
@endsection
@section('content')
    <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LIVE</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-md-flex">
                    <div class="table-responsive">

                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Назва</th>
                                    <th>Організатор</th>
                                    <th>Старт</th>
                                    {{-- <th>Результат</th> --}}
                                    <th>відс</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                      <td>{{$event->date}}</td>

                                        <td><a href="{{route('live_show', $event->cid)}}">{{$event->name}}</a></td>
                                        <td><a href="">{{$event->organizer}}</a></td>
                                        <td><span class="badge {{$event->color}}">
                                          {{$event->status}}</span></td>
                                        {{-- <td>00:25:30</td> --}}
                                        <td>Стартові/Результати</td>
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
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
