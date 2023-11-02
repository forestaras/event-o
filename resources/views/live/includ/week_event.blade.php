@php
    $events = App\Http\Controllers\LiveRezultsController::week_event();
@endphp
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Цього тижня</h3>
    </div> 
    <!-- /.card-header -->
    <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach ($events as $event)
                
           
            <li class="item">
                <!-- <div class="product-img">
                                                        <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                                    </div> -->
                <div class="product-info">
                    <a href="{{route('live_show', $event->cid)}}" class="product-title">{{$event->name}}
                        <span class="badge badge-success float-right">{{$event->date}}</span></a>
                    <span class="product-description">
                        {{$event->organizer}}
                    </span>
                </div>
            </li>
            @endforeach
            <!-- /.item -->
           
            <!-- /.item -->
        </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
        <a href="{{url('/livess')}}">Подивитись всі онлайни</a>
        
    </div>
    <!-- /.card-footer -->
</div>
