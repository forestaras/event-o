@extends('live.includ.index')
@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/livess/') }}">головна</a>/<a
            href="{{ url('/livess/show/' . $event->cid) }}">{{ $event->name }}</a>/Спліти</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Спліти {{ $event->name }}</h2>

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



            <table class="kk table table-striped table-bordered split m-0 p-0 kk" id="kk">
                <tr>
                    <td>Місце</td>
                    <td>Імя</td>
                    <td>Результат</td>
                    @foreach ($mopkp as $kp)
                        <td>{{ $kp->ctrl }}</td>
                    @endforeach

                    <td>Фініш</td>
                    <td>Результат</td>
                    <td>Імя</td>



                </tr>
                @foreach ($people_rezult as $people)
                    <tr>
                        <td>{{ $people['mistse'] }}</td>
                        <td><b>{{ $people['name'] }}</b><br>{{ $people['club'] }}</td>
                        <td><b>{{ $people['result'] }}</b><br>{{ $people['vidst'] }}</td>
                        @foreach ($people['split'] as $split)
                            <td>
                                <abbsss id="color{{ $split['count_all'] }}"title="{{ $split['time_vidst_rt'] }}">
                                    {{ $split['time'] }} ({{ $split['count_all'] }})</abbsss> <br>
                                <abbsss id="color{{ $split['count_cp'] }}"title="{{ $split['time_vidst_rt_peregon'] }}">
                                    {{ $split['time_peregon'] }}({{ $split['count_cp'] }})</abbsss><br>

                            </td>
                        @endforeach
                        <td>{{ $people['finish'] }}<br>
                            {{ $people['rt_peregon'] }}
                        </td>
                        <td><b>{{ $people['result'] }}</b><br>{{ $people['vidst'] }}</td>
                        <td><b>{{ $people['name'] }}</b><br>{{ $people['club'] }}</td>
                    </tr>
                @endforeach

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
