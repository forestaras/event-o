@extends('live.includ.index')
@section('map_site')
<li class="breadcrumb-item"><a href="{{url('/livess/')}}">головна</a>/<a href="{{url('/livess/show/'.$event->cid)}}">{{$event->name}}</a>/Результати</li>
@endsection
@section('content')
<div class="col-md-8">
<div class="info-box mb-3">
    <div class="info-box-content">
        <div class="btn-group-toggle">
            @foreach ($grups as $grup)            
            @if ($grup->id==$cls)
            <a href="{{url('/livess/online/'.$grup->cid.'/'.$grup->id)}}"><label class="btn btn-secondary active">{{$grup->name}}</label></a>                  
            @else
            <a href="{{url('/livess/online/'.$grup->cid.'/'.$grup->id)}}"><label class="btn btn-secondary">{{$grup->name}}</label></a>         
            @endif           
            @endforeach
        </div>
        {{$name_grup}}
        <!-- </span> -->
    </div>
    <!-- /.info-box-content -->
    <!-- /.info-box -->
</div>

@livewire('online', ['cid' =>$cid,'cls'=>$cls])
</div>
@endsection