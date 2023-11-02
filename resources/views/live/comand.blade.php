@extends('live.includ.index')
@section('title')
---{{ $event->name }}---Командні
@endsection
@section('page')
    Командні результати
    <h2 class="card-title">{{ $eventseting->title }} <b>командні результати <a
        href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}
        @if (!$online->name)
            {{ $event->name }}
        @endif
    </a></b></h2>
@endsection

@section('map_site')
<li class="breadcrumb-item">
    <a href="{{ url('/') }}">Головна</a>/
    <a href="{{ url('/event/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
    <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>/
    Командні результати
</li>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card card-primary card-outline card-outline-tabs">
        
        <div class="card-header">
            <div>

            </div>
                <div class="col-12">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if($_GET['vid']=='table')active @endif" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="false">Командні результати талиця</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($_GET['vid']=='graf'or !$_GET['vid'])active @endif " id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Діаграма в режимі онлайн</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                                aria-selected="false">Результати на друк</a>
                        </li>
                        
                    </ul>

                    <small class="float-right">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                    </small>


                </div>

            </div>

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane @if($_GET['vid']=='table')active show @endif " id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Команда</th>
                                        <th>Фінішувало</th>
                                        <th>Сума балів</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clubs as $club)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>{{ $club->mistse }}</td>
                                            <td>{{ $club->name }}</td>
                                            <td>{{ $club->count_fifnsh }}/{{ $club->count_start }}</td>
                                            <td>{{ $club->sumball }}</td>

                                        </tr>
                                        <tr class="expandable-body d-none">
                                            <td colspan="5">
                                                <p style="display: none;">

                                                <table>
                                                    <tr>
                                                        <th>Місце</th>
                                                        <th>Імя</th>
                                                        <th>Група</th>
                                                        <th>Результат</th>
                                                        <th>Бали</th>
                                                    </tr>
                                                    @php
                                                        $x = 0;
                                                    @endphp
                                                    @foreach ($peopless as $people)
                                                        @if ($people->org == $club->id)
                                                            @php
                                                                $x = $x + 1;
                                                            @endphp
                                                            <tr @if ($x <= $zalik) class="table-dark" @endif>
                                                                <td>{{ $people->mistse }}</td>
                                                                <td>{{ $people->name }}</td>
                                                                <td>{{ $people->cls_name }}</td>
                                                                <td>{{ $people->rezult }}</td>
                                                                <td>{{ round($people->bali, 2) }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                                </p>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="tab-pane fade @if($_GET['vid']=='graf' or !$_GET['vid'])active show @endif " id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">
                        @foreach ($clubs as $club)
                                <div class="progress" style="padding: 1px;">
                                    <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15"
                                        aria-valuemin="0" aria-valuemax="100">{{ $club->mistse }}.{{ $club->name }}
                                        {{ $club->count_fifnsh }}з{{ $club->count_start }}</div>
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ $club->bal_vits }}%" aria-valuenow="30" aria-valuemin="0"
                                        aria-valuemax="100">{{ $club->sumball }}
                                    </div>
                                </div>
                          
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-four-messages-tab">
                        Результати для друку появляться згодом. Якщо розробник не забудеться)
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
