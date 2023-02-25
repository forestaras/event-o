@php
    $clubs = App\Http\Controllers\LiveRezultsController::widget_comand($event->cid);
@endphp
<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Командні результати</font>
                </font>
            </h3>

            <div class="card-tools">
                <span class="badge badge-danger">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">всього команд {{$clubs['all']}}</font>
                    </font>
                </span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
                <a href="{{url('/livess/comand/'.$event->cid)}}"><button type="button" class="btn btn-tool">
                  <i class="fas fa-expand"></i>
              </button> </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Команда</th>
                        <th>Графік</th>
                        <th style="width: 40px">Бали</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($clubs as $club)
                  @if ($club->mistse<=4)  
                    <tr>
                        <td>{{$club->mistse}}</td>
                        <td>{{$club->name}}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-success" style="width: {{$club->bal_vits}}%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-success">{{$club->sumball}}</span></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a href="{{url('/livess/comand/'.$event->cid)}}">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Перейти до командних результатів</font>
                </font>
            </a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!--/.card -->
</div>
