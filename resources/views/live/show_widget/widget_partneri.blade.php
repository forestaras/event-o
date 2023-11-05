@php
    $reclams = App\Http\Controllers\LiveRezultsController::widget_partneri();
@endphp
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Партнери</h3>
    </div>
    <!-- /.card-header -->
    <br>
    <div class="card-body p-0">
        <div class="row">
            @foreach ($reclams as $reclam)
                {!! $reclam->text !!}


                <div class="col-6 col-sm-6 col-sm-push-6">
                    <a href="{{$reclam->url}}"><img src="{{ asset($reclam->img) }}" class="img-fluid" alt=""></a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer text-center">
        <a href="{{ url('/livess') }}">Подивитись всі онлайни</a>

    </div> --}}
    <!-- /.card-footer -->
</div>
{{-- <div class="card">
    <img src="dist/img/user1-128x128.jpg" alt="User Avatar">
</div> --}}
