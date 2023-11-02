@php
    $grups = App\Http\Controllers\LiveRezultsController::widget_rezult($event->cid);
@endphp
<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <a href="{{url('/livess/rezult/'.$event->cid)}}"<font style="vertical-align: inherit;">Результати <small class="badge badge-success"><i class="fas fa-compass"></i> {{$event->count_rez}}/{{$event->count_all}}</small></font></a>
                </font>
            </h3>
            <div class="card-tools">
                @if ($event->live == 'ОНЛАЙН')
                    <span class="badge badge-warning">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Онлайн</font>
                        </font>
                    </span>
                @endif
                <a href="{{url('/livess/rezult/'.$event->cid)}}"><button type="button" class="btn btn-tool">
                    <i class="fas fa-expand"></i>
                </button> </a>
                            

                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button> --}}
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">

                    <span class="direct-chat-name float-left">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                @foreach ($grups as $grup)
                                    <a href="{{url('/livess/rezult/'.$grup->cid.'#'.$grup->name)}}">{{ $grup->name }}</a>|
                                @endforeach
                            </font>
                        </font> 
                    </span>
                    {{-- <span class="direct-chat-timestamp float-right">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">23 січня 14:00</font>
                            </font>
                        </span> --}}


                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->

            <!-- /.direct-chat-pane -->
        </div>

        <!-- /.card-body -->
        {{-- <div class="card-footer text-center">
            
   
                    <a href="{{url('/livess/rezult/'.$event->cid)}}" class="btn btn-primary btn-block"><b>Перейти на сторінку результатів</b></a>
                   
            
        </div> --}}
        <!-- /.card-footer -->
    </div>
    <!--/.card -->
</div>
