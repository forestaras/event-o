<meta http-equiv="refresh" content="20">
@extends('live.includ.index')
@section('title')
    ---{{ $online->name }}---Результати
@endsection
@section('page')
    Онлайн центр
@endsection

@section('map_site')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Головна</a>/
        <a href="{{ url('/event/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
        <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>/
        Результати
    </li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            @include('live.includ.header_rez')
            <br>
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
            @include('live.includ.header_sort')

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
                @if ($grup->reley==0)
                    
                

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
                                            {!!$grupa->rezult!!}|
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
                                                <th>#</th>
                                                <th>Імя</th>
                                                <th>Команда,клуб</th> 
                                                <th>Старт</th>
                                                <th>Рез</th>
                                                <th>Відс</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peoples as $people)
                                                @if ($grup->name == $people['cls'])
                                                    @if ($people['mistse'] == 1)
                                                        <tr class="table-success">
                                                        @elseif ($people['mistse'] == 2)
                                                        <tr class="table-warning">
                                                        @elseif ($people['mistse'] == 3)
                                                        <tr class="table-danger">
                                                        @else
                                                        <tr>
                                                    @endif
                                                    <td>{{ $people['mistse'] }}</td>
                                                    <td><a
                                                            href="/livess/atlet/{{ $people['name'] }}">{{ $people['name'] }}</a>
                                                    </td>
                                                    <th class="d-sm-none"><a  href="?sort=club#{{ $people['org'] }}">{{ $people['club'] }}</a>
                                                    </th>
                                                    <th class="d-none d-sm-table-cell"><a  href="?sort=club#{{ $people['org'] }}">{{ $people['org'] }}</a>
                                                    </th>
                                                    <td>{{ $people['start'] }}</td>
                                                    <td>{{ $people['rez_stat'] }}</td>
                                                    <td>{{ $people['vids'] }} </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
            @if ($_GET['sort'] == 'club')
                <?php
                $cls = array_column($peoples, 'plases');
                $st = array_column($peoples, 'cls');
                array_multisort($cls, SORT_ASC, $st, SORT_ASC, $peoples);
                ?>
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
                                                <th>#</th>
                                                <th>Імя</th>
                                                <th>Група</th>
                                                <th>Старт</th>
                                                <th>Рез</th>
                                                <th>Відс</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peoples as $people)
                                                @if ($club->name == $people['org'])
                                                    @if ($people['mistse'] == 1)
                                                        <tr class="table-success">
                                                        @elseif ($people['mistse'] == 2)
                                                        <tr class="table-warning">
                                                        @elseif ($people['mistse'] == 3)
                                                        <tr class="table-danger">
                                                        @else
                                                        <tr>
                                                    @endif
                                                    <td>{{ $people['mistse'] }}</td>
                                                    <td><a
                                                            href="/livess/atlet/{{ $people['name'] }}">{{ $people['name'] }}</a>
                                                    </td>
                                                    <th><a href="?#{{ $people['cls'] }}">{{ $people['cls'] }}</a></th>
                                                    <td>{{ $people['start'] }}</td>
                                                    <td>{{ $people['rez_stat'] }}</td>
                                                    <td>{{ $people['vids'] }} </td>
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
