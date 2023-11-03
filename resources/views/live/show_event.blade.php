@extends('live.includ.index')
@section('title') 
---{{ $event->name }}---
@endsection
@section('page')
    Онлайн центр
@endsection
@section('map_site')
<li class="breadcrumb-item"><a href="{{url('/livess/')}}">Головна</a>/{{ $event->name }}</li>
@endsection
@section('content')
    {{-- {{$event->live2}}
{{$event->timestamp}} --}}
    <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            <div class="card-header">

                <h4 class="card-title"><b>{{ $event->name }}</b></h4>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <a href="{{url('/livess')}}" title="Назад"><i class="fa fa-reply"></i></a>                      
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-md-flex">

                    <div class="col-12 col-sm-12">




                        {{-- <h3 class="my-3">{{ $event->name }}</h3> --}}
                        <p class="my-3">
                            {{-- Назва: {{$event->name}}<br> --}}
                            Дата: <b>{{$event->date}}</b><br>
                            @if ($event->organizer)
                                Організатор: <b>{{$event->organizer}}</b><br>
                            @endif
                            @if ($event->homepage)
                            <a href=" {{$event->homepage}}">сторінка змагань</a>
                            
                            @endif
                            Учасників: <span class="badge bg-warning"><b>{{$event->count_all}}</b></span><br>
                            Команд: <span class="badge bg-warning"><b>{{$event->club}}</b></span><br>

                             {{-- Організація: {{$event->organizer}}<br> --}}

                        {{-- <div class="mt-4">
                            @if ($event->live == 'ОНЛАЙН')
                                <a href="">
                                    <div class="btn btn-primary btn-lg btn-flat">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Зараз в онлайні
                                    </div>
                                </a>
                            @endif

                            @if ($event->rez == 'результати')
                                <a href="">
                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-heart fa-lg mr-2"></i>
                                        Результати
                                    </div>
                                </a>
                            @endif

                            @if ($event->split == 'Спліти')
                                <a href="">
                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-heart fa-lg mr-2"></i>
                                        Спліти
                                    </div>
                                </a>
                            @endif
                        </div> --}}
                        {{-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua
                            butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                        <hr>
                        <h4>Available Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center active">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off"
                                    checked="">
                                Green
                                <br>
                                <i class="fas fa-circle fa-2x text-green"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                Blue
                                <br>
                                <i class="fas fa-circle fa-2x text-blue"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                Purple
                                <br>
                                <i class="fas fa-circle fa-2x text-purple"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                Red
                                <br>
                                <i class="fas fa-circle fa-2x text-red"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                Orange
                                <br>
                                <i class="fas fa-circle fa-2x text-orange"></i>
                            </label>
                        </div>

                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                <span class="text-xl">S</span>
                                <br>
                                Small
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                <span class="text-xl">M</span>
                                <br>
                                Medium
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                <span class="text-xl">L</span>
                                <br>
                                Large
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                <span class="text-xl">XL</span>
                                <br>
                                Xtra-Large
                            </label>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                $80.00
                            </h2>
                            <h4 class="mt-0">
                                <small>Ex Tax: $80.00 </small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Add to Wishlist
                            </div>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div> --}}

                    </div>
                    <!-- /.card-pane-right -->
                </div>
                {{-- {!! $events->links() !!} --}}
                <!-- /.d-md-flex -->
            </div>


            <!-- /.card-body -->
        </div>
        <div class="row">
            @if ($event->seting->rezult )
              @include('live.show_widget.widget_rezult')  
            @endif
            @if ($event->seting->split)
             @include('live.show_widget.widget_split')
            @endif

            @if ($event->seting->comandni and $event->com_rez==1)
             @include('live.show_widget.widget_comand')
            @endif

            @if ($event->seting->split)
             @include('live.show_widget.widget_start_cloks')
            @endif
            
            
            {{-- @include('live.show_widget.widget_download') --}}

            
            <!-- /.col -->

            {{-- <div class="col-md-6">
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
                                    <font style="vertical-align: inherit;">8 нових учасників</font>
                                </font>
                            </span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Task</th>
                              <th>Progress</th>
                              <th style="width: 40px">Label</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1.</td>
                              <td>Update software</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-danger">55%</span></td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Clean database</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-warning">70%</span></td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td>Cron job running</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar bg-primary" style="width: 30%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-primary">30%</span></td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td>Fix and squish bugs</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar bg-success" style="width: 90%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-success">90%</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="javascript:">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Переглянути всіх користувачів</font>
                            </font>
                        </a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!--/.card -->
            </div> --}}

            {{-- <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Офіційні результати</font>
                            </font>
                        </h3>

                        <div class="card-tools">
                            <span class="badge badge-danger">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">8 нових учасників</font>
                                </font>
                            </span>
                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content">
                                <i class="fas fa-sync-alt"></i>
                              </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="javascript:">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Переглянути всіх користувачів</font>
                            </font>
                        </a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!--/.card -->
            </div> --}}
            <!-- /.col -->
        </div>

        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
