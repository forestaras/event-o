@extends('live.includ.index')
@section('title')
    ---Спортсмени---Результати
@endsection
@section('page')
    Спортсмени
@endsection

@section('map_site')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Головна</a>/
        {{-- <a href="{{ url('/event/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
        <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>/ --}}
        Результати
    </li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title"> <b>Спортсмени </b></h2>


                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}" title="Назад"><i
                                class="fa fa-reply"></i></a>
                    </button>
                    @if ($online->split)
                        <button type="button" class="btn btn-tool">
                            <a href="{{ url('/livess/split/' . $event->cid) }}" title="Спліти"><i
                                    class="fa fa-random"></i></a>
                        </button>
                    @endif
                    <button type="button" class="btn btn-tool">
                        <a href="#" onclick="parent.location.reload(); return false;" title="Оновити"><i
                                class="fa fa-undo"></i></a>
                    </button>


                </div> --}}
            </div>
            {{-- <div class="col-12 col-sm-12"> --}}
            {{-- <div class="card-body row">
                @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-block disabled"><i class="fas fa-users"></i>
                            Групи</button>
                    </div>
                    <div class="col-md-6">
                        <a href="?sort=club"><button type="button" class="btn btn-outline-primary btn-block"><i
                                    class="fas fa-users"></i> Клуби</button></a>
                    </div>
                @endif
                @if ($_GET['sort'] == 'club')
                    <div class="col-md-6">
                        <a href="?sort=grup"><button type="button" class="btn btn-outline-primary btn-block"><i
                                    class="fas fa-users"></i> Групи</button></a>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-block disabled"><i class="fas fa-users"></i>
                            Клуби</button>
                    </div>
                @endif

            </div> --}}

            {{-- <div>
                    <button type="button" class="btn btn-block btn-success">Success</button>
                <p class="my-3">Показати результати і стартові по
                    @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
                    <a href="?sort=club" class="btn btn-sm btn-info float-left">Команди</a>
                        <a href="?sort=club">КОМАНДАХ</a>
                    @endif
                    @if ($_GET['sort'] == 'club')
                        <a href="?sort=grup">ГРУПАХ</a>
                    @endif
                </div> --}}
            {{-- </div> --}}

            <!-- /.card-header -->


            <div>
                {{-- <p id="{{ $grup->name }}"> --}}
                {{-- <br>
                            <br> --}}
                </p>


                {{-- <div class="row card-header">
                    <div class="col-12">
                        <div>
                            <h5>
                                <span class="badge bg-primary">{{ $grup->name }}</span>

                                <small class="float-right">
                                    @foreach ($grups as $grupa)
                                        <a href="#{{ $grupa->name }}">{{ $grupa->name }}</a>|
                                    @endforeach
                                </small>
                            </h5>
                        </div>
                    </div>
                     --}}
            </div>
            <div class="card-body p-0">
                <div class="d-md-flex">
                    <div class="table-responsive">
                        <div class="card-footer">
                            <form action="/livess/search_atlet" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="query" placeholder="Введіть Прізвище Імя"
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-warning">Пошук спортсмена</button>
                                    </span>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Список спортсменів</h3>

                        <div class="card-tools">
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
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>

                                    <tr>
                                        <th>Прізвище Імя</th>
                                        <th>Група</th>
                                        <th>Команда</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($athletes as $athlete)
                                        <tr>
                                            <td><a href="/livess/atlet/{{ $athlete->name }}">{{ $athlete->name }}</a></td>
                                            <td><span class="badge badge-success">{{ $athlete->grup}}</span></td>
                                            <td>{{ $athlete->club}}</td>
                                            <td><a href="/livess/atlet/{{ $athlete->name }}"><button class="btn btn-primary btn-sm"><b>Перейти</b></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
                    </div>
                    <!-- /.card-footer -->
                </div>
                



            </div>
        </div>

        <!-- /.card-body -->

        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
