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


            @if (!$_GET['leg'])
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h5>
                                {{ $grupa }}
                                <span class="badge bg-primary">{{ $grup->name }}</span>
                                <small class="float-center">
                                    @foreach ($etap as $e)
                                        <a href="?grup={{ $grupa }}&leg={{ $e->leg }}">Етап
                                            {{ $e->leg }}</a>|
                                    @endforeach
                                    <a href="?grup={{ $grupa }}">Загальні</a>

                                </small>

                                <small class="float-right">
                                    @foreach ($grups as $grup)
                                        {!!$grup->rezult!!}|
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
                                        <th>Команда kk</th>
                                        <th>Учасник</th>
                                        <th>Етап</th>
                                        <th>Рез на етапі</th>
                                        <th>Рез після етапу</th>
                                        <th>Результат</th>
                                        {{-- <th>Відс</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        @foreach ($team->peoples as $people)
                                            @if ($people->leg == 1)
                                                <tr>
                                                    <th rowspan="{{ $team->count }}">{{ $team->mistse }}</th>
                                                    <th rowspan="{{ $team->count }}">{{ $team->name }}</th>
                                                    <td><a
                                                        href="/livess/atlet/{{ $people->name }}">{{ $people->name }}</a></td>
                                                    <td>{{ $people->leg }}</td>
                                                    <td>{{ $people->rez_stat }}</td>
                                                    <td>{{ $people->etap }}</td>
                                                    <th rowspan="{{ $team->count }}">{{ $team->rez_stat }}</th>
                                                    {{-- <th rowspan="{{ $team->count}}">{{ $team->rezult }}</th> --}}


                                                </tr>
                                            @else
                                                @if ($team->count == $people->leg)
                                                    <tr style="border-bottom: 3px solid black;">
                                                    @else
                                                    </tr>
                                                @endif
                                                <td><a
                                                    href="/livess/atlet/{{ $people->name }}">{{ $people->name }}</a></td>
                                                <td>{{ $people->leg }}</td>
                                                <td>{{ $people->rez_stat }}</td>
                                                <td>{{ $people->etap }}</td>


                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach



                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            @endif
            @if ($_GET['leg'])
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h5>
                                {{ $grupa }}-Етап {{ $_GET['leg'] }}
                                <span class="badge bg-primary">{{ $grup->name }}</span>
                                <small class="float-center">
                                    @foreach ($etap as $e)
                                        <a href="?grup={{ $grupa }}&leg={{ $e->leg }}">Етап
                                            {{ $e->leg }}</a>|
                                    @endforeach
                                    <a href="?grup={{ $grupa }}">Загальні</a>

                                </small>

                                <small class="float-right">
                                    @foreach ($grups as $grupa)
                                        <a href="?grup={{ $grupa->name }}">{{ $grupa->name }}</a>|
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
                                        <th>Команда</th>
                                        <th class="d-none d-sm-table-cell">Клуб</th>
                                        <th class="d-none d-sm-table-cell">Старт</th>
                                        <th>Рез</th>
                                        <th>Відс</th>
                                        {{-- <th>Відс</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($peoples as $people)
                                        <tr>

                                            <td>{{ $people->mistse }}</td>
                                            <td><a
                                                href="/livess/atlet/{{ $people->name }}">{{ $people->name }}</a></td>
                                            <td>{{ $people->team->name }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $people->org->name }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $people->start }}</td>
                                            <td>{{ $people->rez_stat }}</td>
                                            <td>{{ $people->vids }}</td>




                                        </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            @endif


            {{-- @endif --}}

            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>

@endsection
