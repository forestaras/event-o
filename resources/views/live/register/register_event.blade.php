@extends('live.includ.index')
@section('title')
    ---{{ $event->name }}---Зареєстровані
@endsection
@section('page')
    Реєстрація
@endsection
@section('map_site')
    <li class="breadcrumb-item">
        <a href="{{ url('/event/') }}">Головна</a>/<a href="{{ url('/event/' . $registerseting->eventid)}}">Подія</a>/Реєстрація
    </li>
@endsection
@section('content')
    <div class="col-md-9">

        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title"><b>Зареєстровані {{ $registerseting->title }}</b></h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <a href="{{ url('/event/' . $registerseting->eventid) }}" title="Назад"><i class="fa fa-reply"></i></a>
                    </button>
                </div>

                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <a href="{{ url('/livess/show/' . $event->cid) }}" title="Назад"><i class="fa fa-reply"></i></a>
                    </button>
                    <button type="button" class="btn btn-tool">
                        <a href="{{ url('/livess/split/' . $event->cid) }}" title="Спліти"><i class="fa fa-random"></i></a>
                    </button>
                    <button type="button" class="btn btn-tool">
                        <a href=" " title="Оновити"><i class="fa fa-undo"></i></a>
                    </button> --}}


            </div>
        </div>

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
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Кінець пеєстрації:
                            <b>{{ date_format(date_create($registerseting->datestop), 'd.m.Y H:i:s') }}</b></span>
                        <span class="info-box-text">Зареєстровано учасників: <b>{{ $registers->count() }}.</b>
                            @if ($registerseting->si)
                                Оренда чіпів: <b>{{ $registers->where('si', 0)->count() }}.</b>
                            @endif
                        </span>

                        <span class="info-box-text">
                            @if ($registerseting->club)
                                Команд:
                                <b>{{ $registers->unique('club')->count() }}.</b>
                            @endif
                            @if ($registerseting->obl)
                                Областей: <b>{{ $registers->unique('obl')->count() }}.</b>
                            @endif
                        </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
           
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        @if (date_format(date_create($registerseting->datestop), 'U') > date('U'))
                            <a href="/admin/register/add/?registerid={{ $registerseting->id }}" type="button"
                                class="btn btn-xs btn-success">
                                @if (!CRUDBooster::myName())
                                    Увійти і зареєструватися
                                @else
                                    Зареєструватися
                                @endif
                            </a>
                        @else
                            РЕЄСТРАЦІЮ ЗАКРИТО!!!
                        @endif
                        <br>
                        <a href="/event/{{ $registerseting->eventid }}" type="button" class="btn btn-xs btn-primary">
                            Сторінка змагань
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            @include('live.includ.header_sort')



            {{-- @endif --}}
            <!-- /.col -->
        </div>


        <!-- /.card-header -->

        {{-- @if ($_GET['sort'] == 'grup' or !$_GET['sort']) --}}
        @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
            @foreach ($registerseting->grups as $grup)
                <div>
                    <p id="{{ $grup }}">
                        {{-- <br>
                            <br> --}}
                    </p>
                    <div class="row card-header">
                        <div class="col-12">
                            <div>
                                <h5>
                                    <span class="badge bg-primary">{{ $grup }}</span>
                                    <small class="float-right">
                                        @foreach ($registerseting->grups as $grupa)
                                            <a href="#{{ $grupa }}">{{ $grupa }}</a>|
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
                                            <th>Н.п.п</th>
                                            <th>Імя</th>
                                            @if ($registerseting->rik)
                                                <th>Народження</th>
                                            @endif
                                            @if ($registerseting->roz)
                                                <th>Розряд</th>
                                            @endif
                                            @if ($registerseting->obl)
                                                <th>Область</th>
                                            @endif
                                            @if ($registerseting->club)
                                                <th>Команда,клуб</th>
                                            @endif
                                            @if ($registerseting->trener)
                                                <th>Тренер</th>
                                            @endif
                                            @if ($registerseting->si)
                                                <th>SI</th>
                                            @endif
                                            @if ($registerseting->dni)
                                                <th>Дні</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 0;
                                        @endphp
                                        @foreach ($registers as $register)
                                            @if ($grup == $register->grup)
                                                <tr>
                                                    <td>{{ $x = $x + 1 }}</td>
                                                    <td><a href="/livess/atlet/{{ $register->name }}">{{ $register->name }}</a></td>
                                                    @if ($registerseting->rik)
                                                        <td>{{ $register->rik }}</td>
                                                    @endif
                                                    @if ($registerseting->roz)
                                                        <td>{{ $register->roz }}</td>
                                                    @endif
                                                    @if ($registerseting->obl)
                                                    <th><a href="?sort=obl#{{ $register->obl }}">{{ $register->obl }}</a>
                                                        
                                                    @endif
                                                    @if ($registerseting->club)
                                                    <th><a href="?sort=club#{{ $register->club }}">{{ $register->club }}</a>
                                                    @endif
                                                    @if ($registerseting->trener)
                                                        <td>{{ $register->trener }}</td>
                                                    @endif
                                                    @if ($registerseting->si)
                                                        <td>{{ $register->si }}</td>
                                                    @endif
                                                    @if ($registerseting->dni)
                                                        <td>{{ $register->dni }}</td>
                                                    @endif

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
            @foreach ($registers->unique('club') as $grup)
                <div>
                    <p id="{{ $grup->club }}">
                        {{-- <br>
                            <br> --}}
                    </p>
                    <div class="row card-header">
                        <div class="col-12">
                            <div>
                                <h5>
                                    <span class="badge bg-primary">{{ $grup->club }}</span>
                                    <small class="float-right">
                                        @foreach ($registers->unique('club') as $grupa)
                                            <a href="#{{ $grupa->club }}">{{ $grupa->club }}</a>|
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
                                            <th>Н.п.п</th>
                                            <th>Імя</th>
                                            <th>Група</th>
                                            @if ($registerseting->rik)
                                                <th>Народження</th>
                                            @endif
                                            @if ($registerseting->roz)
                                                <th>Розряд</th>
                                            @endif
                                            @if ($registerseting->obl)
                                                <th>Область</th>
                                            @endif
                                        
                                            @if ($registerseting->trener)
                                                <th>Тренер</th>
                                            @endif
                                            @if ($registerseting->si)
                                                <th>SI</th>
                                            @endif
                                            @if ($registerseting->dni)
                                                <th>Дні</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 0;
                                        @endphp
                                        @foreach ($registers as $register)
                                            @if ($grup->club == $register->club)
                                                <tr>
                                                    <td>{{ $x = $x + 1 }}</td>
                                                    <td><a href="/livess/atlet/{{ $register->name }}">{{ $register->name }}</a></td>
                                                    <th><a href="?sort=grup#{{ $register->grup }}">{{ $register->grup }}</a>   
                                                    @if ($registerseting->rik)
                                                        <td>{{ $register->rik }}</td>
                                                    @endif
                                                    
                                                    
                                                    @if ($registerseting->roz)
                                                        <td>{{ $register->roz }}</td>
                                                    @endif
                                                    @if ($registerseting->obl)
                                                    <th><a href="?sort=obl#{{ $register->obl }}">{{ $register->obl }}</a>   
                                                    @endif
                                                
                                                    @if ($registerseting->trener)
                                                        <td>{{ $register->trener }}</td>
                                                    @endif
                                                    @if ($registerseting->si)
                                                        <td>{{ $register->si }}</td>
                                                    @endif
                                                    @if ($registerseting->dni)
                                                        <td>{{ $register->dni }}</td>
                                                    @endif

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
        @if ($_GET['sort'] == 'obl')
            @foreach ($registers->unique('obl') as $grup)
                <div>
                    <p id="{{ $grup->obl }}">
                        {{-- <br>
                            <br> --}}
                    </p>
                    <div class="row card-header">
                        <div class="col-12">
                            <div>
                                <h5>
                                    <span class="badge bg-primary">{{ $grup->obl }}</span>
                                    <small class="float-right">
                                        @foreach ($registers->unique('obl') as $grupa)
                                            <a href="#{{ $grupa->obl }}">{{ $grupa->obl }}</a>|
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
                                            <th>Н.п.п</th>
                                            <th>Імя</th>
                                            <th>Група</th>
                                            @if ($registerseting->rik)
                                                <th>Народження</th>
                                            @endif
                                            @if ($registerseting->roz)
                                                <th>Розряд</th>
                                            @endif
                                            @if ($registerseting->club)
                                                <th>Клуб</th>
                                            @endif
                                        
                                            @if ($registerseting->trener)
                                                <th>Тренер</th>
                                            @endif
                                            @if ($registerseting->si)
                                                <th>SI</th>
                                            @endif
                                            @if ($registerseting->dni)
                                                <th>Дні</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 0;
                                        @endphp
                                        @foreach ($registers as $register)
                                            @if ($grup->obl == $register->obl)
                                                <tr>
                                                    <td>{{ $x = $x + 1 }}</td>
                                                    <td><a href="/livess/atlet/{{ $register->name }}">{{ $register->name }}</a></td>
                                                    <th><a href="?sort=grup#{{ $register->grup }}">{{ $register->grup }}</a>   
                                                    @if ($registerseting->rik)
                                                        <td>{{ $register->rik }}</td>
                                                    @endif
                                                    
                                                    
                                                    @if ($registerseting->roz)
                                                        <td>{{ $register->roz }}</td>
                                                    @endif
                                                    @if ($registerseting->club)
                                                    <th><a href="?sort=club#{{ $register->club }}">{{ $register->club }}</a>   
                                                    @endif
                                                
                                                    @if ($registerseting->trener)
                                                        <td>{{ $register->trener }}</td>
                                                    @endif
                                                    @if ($registerseting->si)
                                                        <td>{{ $register->si }}</td>
                                                    @endif
                                                    @if ($registerseting->dni)
                                                        <td>{{ $register->dni }}</td>
                                                    @endif

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
        

        {{-- @endif --}}

        <!-- /.card-body -->
    </div>
@endsection
