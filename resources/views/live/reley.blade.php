@extends('live.includ.index')
@section('map_site')
    {{-- <li class="breadcrumb-item"><a href="{{url('/livess/')}}">головна</a>/<a href="{{url('/livess/show/'.$event->cid)}}">{{$event->name}}</a>/Результати</li> --}}
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
                @foreach ($grups as $grup)
                    {{ $grup->name }}
                    <table border="solid 2px">
                        @foreach ($grup->teams as $team)
                           
                                        
                                
                                
                                    @foreach ($team->peoples as $people)
                                     @if ($people->leg==1)                                                                          
                                    <tr>
                                        <th rowspan="{{ $team->count}}">{{ $team->name }}</th>
                                        <td>{{ $people->name }}</td>
                                        <td>{{ $people->leg }}</td>
                                        <th rowspan="{{ $team->count}}">{{ $team->mistse }}</th>
                                        <td>{{ $people->rez_stat }}</td>
                                        <td>{{ $people->etap }}</td>
                                        {{-- <th rowspan="{{ $team->count}}">{{ $team->rezult }}</th> --}}
                                        <th rowspan="{{ $team->count}}">{{ $team->rez_stat }}</th>


                                    </tr>    
                                    @else
                                    <tr>   
                                        <td>{{ $people->name }}</td>
                                        <td>{{ $people->leg }}</td>
                                        <td>{{ $people->rez_stat }}</td>
                                        <td>{{ $people->etap }}</td>


                                    </tr>
                                    @endif 
                                    @endforeach
                                
                            
                        @endforeach

                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection
