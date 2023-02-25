@extends('live.includ.index')
@section('map_site')
<li class="breadcrumb-item"><a href="{{url('/livess/')}}">головна</a>/<a href="{{url('/livess/show/'.$event->cid)}}">{{$event->name}}</a>/Результати</li>
@endsection
@section('content')
    <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Результати {{ $event->name }}</h2>

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
            @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
            @foreach ($grups as $grup)
            <div>
                <p id="{{ $grup->name }}">
                    <br>
                    <br>
                    </p>
                
                <div class="row">
                    <div class="col-12">
                        <h5>
                            {{ $grup->name }}
                            <small
                                class="float-right">
                                @foreach ($grups as $grupa)
                                   <a href="#{{ $grupa->name }}">{{ $grupa->name }}</a>|
                                @endforeach
                            </small>
                        </h5>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="card-body p-0">
                    <div class="d-md-flex">
                        <div class="table-responsive">

                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Місце</th>
                                    <th>Імя</th>
                                    <th>Команда,клуб</th>
                                    <th>Старт</th>
                                    <th>Рез</th>
                                    <th>Відставання</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peoples as $people)
                                    @if ($grup->name == $people['cls'])
                                        <tr>
                                            <td>{{ $people['mistse'] }}</td>
                                            <td><a
                                                    href="/online/showpeople/{{ $people['name'] }}">{{ $people['name'] }}</a>
                                            </td>
                                            <th><a href="?sort=club#{{ $people['org'] }}">{{ $people['org'] }}</a></th>
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
                
                <div class="row">
                    <div class="col-12">
                        <h5>
                            {{ $club->name }}
                            <small
                                class="float-right">
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

                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Місце</th>
                                    <th>Імя</th>
                                    <th>Група</th>
                                    <th>Старт</th>
                                    <th>Рез</th>
                                    <th>Відставання</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peoples as $people)
                                    @if ($club->name == $people['org'])
                                        <tr>
                                            <td>{{ $people['mistse'] }}</td>
                                            <td><a
                                                    href="/online/showpeople/{{ $people['name'] }}">{{ $people['name'] }}</a>
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
