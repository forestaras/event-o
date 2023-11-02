@extends('live.includ.index')
@section('title')
---{{ $event->name }}---Спліти
@endsection
@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/livess/') }}">головна</a>/<a
            href="{{ url('/livess/show/' . $event->cid) }}">{{ $event->name }}</a>/Спліти</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Спліти до вибраних вами змагань ще не створено</h2>
{{-- 
                <div class="card-tools">                  
                    <button type="button" class="btn btn-tool">
                        <a href="{{url('/livess/show/'.$event->cid)}}" title="Назад"><i class="fa fa-reply"></i></a>                      
                    </button>
                    <button type="button" class="btn btn-tool">
                        <a href="{{url('/livess/rezult/'.$event->cid)}}" title="Результати"><i class="fa fa-list"></i></a>                      
                    </button>
                    <button type="button" class="btn btn-tool">
                        <a href=" " title="Оновити"><i class="fa fa-undo"></i></a>                      
                    </button>
                </div> --}}
            </div>
            
            
            {{-- <div class="row">
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
            </div> --}}



           
            
           
            


        </div>
    </div>
@endsection
