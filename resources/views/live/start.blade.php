@extends('live.includ.index')
@section('title')
    ---{{ $online->name }}---Стартові
@endsection
@section('page')
    Онлайн центр
@endsection

@section('map_site')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Головна</a>/
        <a href="{{ url('/event/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
        <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>/
        Стартові
    </li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title">{{ $eventseting->title }} <b>Стартові <a
                            href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}
                            @if (!$online->name)
                                {{ $event->name }}
                            @endif
                        </a></b></h2>

                <div class="card-tools">
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


                </div>
            </div>
            {{-- <div class="col-12 col-sm-12"> --}}
            <div class="card-body row">
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

            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <div class=" float-left btn-group ">
                    @if ($_GET['sort'] == 'club')
                        <h3>Коанди</h3>
                    @endif
                    @if ($_GET['sort'] == 'obl')
                        <h3>Область</h3>
                    @endif
                    @if ($_GET['sort'] == 'sah')
                        <h3>Шахматка</h3>
                    @endif
                    @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
                        <h3>Групи</h3>
                    @endif+
                </div>

                <div class=" float-right btn-group ">
                    <button type="button" class="btn btn-warning">Сортувати</button>
                    <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown"
                        aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                        @if ($_GET['sort'] != 'grup' or !$_GET['sort'])
                        <a class="dropdown-item" href="?sort=grup#">Групи</a>
                        @endif

                        @if ($_GET['sort'] != 'club')
                            <a class="dropdown-item" href="?sort=club#">Коанди</a>
                        @endif
                        {{-- @if ($_GET['sort'] != 'obl')
                            <a class="dropdown-item" href="?sort=obl#">Область</a>
                        @endif --}}

                        @if ($_GET['sort'] != 'sah')
                            <a class="dropdown-item" href="?sort=sah#">Шахматка</a>
                        @endif

                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="#">Separated link</a> --}}
                    </div>
                </div>
            </div>

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

            @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
                @foreach ($grups as $grup)
                    <div>
                        <p id="{{ $grup->name }}">
                            {{-- <br>
                            <br> --}}
                        </p>


                        <div class="row card-header">
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
                            <!-- /.col -->
                        </div>
                        <div class="card-body p-0">
                            <div class="d-md-flex">
                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered m-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>№</th>
                                                <th>Імя</th>
                                                <th>Команда,клуб</th>
                                                <th>SI</th>
                                                <th>Старт</th>
                                                {{-- <th>Рез</th> --}}
                                                {{-- <th>Відставання</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $x = 0;
                                            @endphp
                                            @foreach ($peoples as $people)
                                                @if ($grup->name == $people['cls'])
                                                    @php
                                                        $x = $x + 1;
                                                    @endphp
                                                    <tr>

                                                        <td>{{ $x }}</td>
                                                        <td><a
                                                                href="/livess/atlet/{{ $people['name'] }}">{{ $people->name }}</a>
                                                        </td>
                                                        <th><a
                                                                href="?sort=club#{{ $people['org'] }}">{{ $people->org }}</a>
                                                        </th>
                                                        <td>{{ $people->si }}</td>

                                                        <td>{{ $people->start }}</td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($_GET['sort'] == 'club')
                @foreach ($clubs as $club)
                    <div>
                        <p id="{{ $club->name }}">
                            <br>
                            <br>
                        </p>

                        <div class="row card-header">
                            <div class="col-12">
                                <h5>
                                    <span class="badge bg-primary">{{ $club->name }}</span>
                                    <small class="float-right">
                                        @foreach ($clubs as $cluba)
                                            <a href="#{{ $cluba->name }}">{{ $cluba->name }}</a>|
                                        @endforeach
                                    </small>
                                </h5>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="card-body p-0">
                            <div class="d-md-flex">
                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered m-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>№</th>
                                                <th>Імя</th>
                                                <th>Група</th>
                                                <th>SI</th>
                                                <th>Старт</th>
                                                {{-- <th>Рез</th> --}}
                                                {{-- <th>Відставання</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $x = 0;
                                            @endphp
                                            @foreach ($peoples as $people)
                                                {{-- {{$people->org}} --}}
                                                @if ($club->id == $people->orgid)
                                                    @php
                                                        $x = $x + 1;
                                                    @endphp
                                                    <tr>

                                                        <td>{{ $x }}</td>
                                                        <td><a
                                                                href="/livess/atlet/{{ $people->name }}">{{ $people->name }}</a>
                                                        </td>
                                                        <th><a
                                                                href="?sort=grup#{{ $people->cls }}">{{ $people->cls }}</a>
                                                        </th>
                                                        <td>{{ $people->si }}</td>

                                                        <td>{{ $people->start }}</td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
            @if ($_GET['sort'] == 'sah')
                {{-- @foreach ($clubs as $club) --}}
                <div>
                    {{-- <p id="{{ $club->name }}">
                            <br>
                            <br>
                        </p> --}}

                    {{-- <div class="row card-header">
                            <div class="col-12">
                                <h5>
                                    <span class="badge bg-primary">{{ $club->name }}</span>
                                    <small class="float-right">
                                        @foreach ($clubs as $cluba)
                                            <a href="#{{ $cluba->name }}">{{ $cluba->name }}</a>|
                                        @endforeach
                                    </small>
                                </h5>
                            </div>
                            <!-- /.col -->
                        </div> --}}
                    <div class="card-body p-0">
                        <div class="d-md-flex">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered m-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>№</th>
                                            <th>Імя</th>
                                            <th>Команда/клуб</th>
                                            <th>Група</th>
                                            <th>SI</th>
                                            <th>Старт</th>
                                            {{-- <th>Рез</th> --}}
                                            {{-- <th>Відставання</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 0;
                                        @endphp
                                        @foreach ($peoples as $people)
                                            {{-- {{$people->org}} --}}
                                            {{-- @if ($club->id == $people->orgid) --}}
                                            @php
                                                $x = $x + 1;
                                            @endphp
                                            <tr>

                                                <td>{{ $x }}</td>
                                                <td><a href="/livess/atlet/{{ $people->name }}">{{ $people->name }}</a>
                                                </td>
                                                <th><a href="?sort=club#{{ $people->org }}">{{ $people->org }}</a>
                                                </th>
                                                <th><a href="?sort=grup#{{ $people->cls }}">{{ $people->cls }}</a>
                                                </th>
                                                <td>{{ $people->si }}</td>

                                                <td>{{ $people->start }}</td>

                                            </tr>
                                            {{-- @endif --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                {{-- @endforeach --}}
            @endif
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection