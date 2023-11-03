@extends('live.includ.index')
@section('title')
    ---{{ $event->name }}---Спліти
@endsection
@section('page')
    Онлайн центр
@endsection
@section('map_site')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Головна</a>/
        <a href="{{ url('/event/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
        <a href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>/
        Спліти
    </li>
@endsection
@if ($errors == 4 or $errors == 2 or $errors == 3)
    @section('content')
        <section class="content">
            @if ($errors == 3)
                <div class="error-page">
                    <h2 class="headline text-danger">500</h2>

                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> УПС.пока нонлайн не був запуущений </h3>

                        <p>
                            Онлайн спліти не були запущені.
                            <a href="{{ url('/livess/show/' . $event->cid) }}">Вернутися назад.</a>
                            <a href=" ">Оновити сторінку.</a>
                        </p>


                    </div>
                </div>
            @endif
            @if ($errors == 2)
                <div class="error-page">
                    <h2 class="headline text-danger">!!!</h2>

                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> УПС.Пока не фінішувало жодного учасника
                        </h3>

                        <p>

                            Пока не фінішувало жодного учасника або організатори не включили онлайн. <a
                                href="{{ url('/livess/show/' . $event->cid) }}">Вернутися назад.</a>
                            <a href=" ">Оновити сторінку.</a>
                        </p>


                    </div>
                </div>
            @endif


            <!-- /.error-page -->

        </section>
    @endsection
@else
    @section('content')
        <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card card-success">
                @include('live.includ.header_rez')
                <style>
                    #color1 {
                        background-color: #ea7a1f;
                    }

                    #color2 {
                        background-color: #1fea6d;
                    }

                    #color3 {
                        background-color: #1FA6EA;
                    }

                    #kk {
                        font-size: 80%;
                    }
                </style>

                <div class="row">
                    <div class="col-12">
                        <h5>
                            {{ $grup }}
                            <small class="float-right">
                                @foreach ($grupss as $grupa)
                                    <a
                                        href="/livess/split/{{ $id }}?grup={{ $grupa->name }}">{{ $grupa->name }}</a>|
                                @endforeach
                            </small>
                        </h5>
                    </div>
                    <!-- /.col -->
                </div>



                <table class="table table-striped table-bordered split m-0 p-0" id="kk">
                    <thead class="thead-dark">
                        <tr>
                            <th>Місце </th>
                            <th>Імя</td>
                            <th>Результат</th>
                            @foreach ($mopkp as $kp)
                                <th>{{ $kp->ctrl }}</th>
                            @endforeach

                            <th>Фініш</th>
                            <th>Результат</th>
                            <th>Імя</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($people_rezult as $people)
                            <tr>
                                <td>{{ $people['mistse'] }}</td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <div><b>{{ $people['name'] }}</b></div>
                                        <div>{{ $people['club'] }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <div><b>{{ $people['result'] }}</b></div>
                                        <div>{{ $people['vidst'] }}</div>
                                    </div>
                                </td>
                                @foreach ($people['split'] as $split)
                                    {{-- <td>{{ $split['ord'] }}</td> --}}
                                    <td>
                                        <div style="display: flex; flex-direction: column;">
                                            @if ($split['count_all'] == 1)
                                                <div class="bg-success disabled color-palette">
                                                @elseif ($split['count_all'] == 2)
                                                    <div class="bg-warning disabled color-palette">
                                                    @elseif ($split['count_all'] == 3)
                                                        <div class="bg-danger disabled color-palette">
                                                        @else
                                                            <div>
                                            @endif
                                            <abbsss title="{{ $split['time_vidst_rt'] }}">
                                                {{ $split['time'] }} ({{ $split['count_all'] }})</abbsss>
                                        </div>
                                        <div style="display: flex; flex-direction: column;">
                                            @if ($split['count_cp'] == 1)
                                                <div class="bg-success disabled color-palette">
                                                @elseif ($split['count_cp'] == 2)
                                                    <div class="bg-warning disabled color-palette">
                                                    @elseif ($split['count_cp'] == 3)
                                                        <div class="bg-danger disabled color-palette">
                                                        @else
                                                            <div>
                                            @endif
                                            <abbsss title="{{ $split['time_vidst_rt_peregon'] }}">
                                                {{ $split['time_peregon'] }}({{ $split['count_cp'] }})</abbsss>
                                        </div>

                                    </td>
                                @endforeach
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <div>{{ $people['finish'] }}</div>
                                        <div> {{ $people['rt_peregon'] }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <div><b>{{ $people['result'] }}</b></div>
                                        <div>{{ $people['vidst'] }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column;">
                                        <div><b>{{ $people['name'] }}</b></div>
                                        <div>{{ $people['club'] }}</div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <div>
                    <canvas id="myChart">
                        <script>
                            // <block:setup:1>
                            const labels = [
                                'Старт',
                                @foreach ($mopkp as $kp)
                                    '{{ $kp->ctrl }}',
                                @endforeach
                                'Фініш',
                            ];
                            const data = {
                                labels: labels,
                                datasets: [
                                    @foreach ($people_rezult as $people)
                                        @if ($people['stat'] == 1)
                                            {
                                                label: '{{ $people['mistse'] }}.{{ $people['name'] }}',
                                                backgroundColor: "{{ $people['color'] }}",
                                                borderColor: "{{ $people['color'] }}",
                                                data: [0,
                                                    @foreach ($people['split'] as $split)
                                                        -{{ $split['rttt'] }},
                                                    @endforeach
                                                ],

                                            },
                                        @endif
                                    @endforeach {
                                        label: 'СуперМен',
                                        backgroundColor: '#66ff33',
                                        borderColor: '#66ff33',
                                        data: [0,
                                            @foreach ($mopkp as $kp)
                                                0,
                                            @endforeach
                                        ],
                                    },
                                ]
                            };
                            // </block:setup>

                            // <block:config:0>
                            const config = {
                                type: 'line',
                                data,
                                options: {
                                    plugins: {
                                        legend: {
                                            position: 'right',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Діаграма сплітів'
                                        }
                                    }
                                }

                            };
                            // </block:config>

                            module.exports = {
                                actions: [],
                                config: config,
                            };
                        </script>
                        <script>
                            // === include 'setup' then 'config' above ===

                            var myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                            );
                        </script>
                    </canvas>
                </div>


            </div>
        </div>
    @endsection
@endif
