@php
    $reclams = App\Http\Controllers\LiveRezultsController::reclam();
@endphp

{{-- <div class="card">
    <img src="dist/img/user1-128x128.jpg" alt="User Avatar">
</div> --}}
@foreach ($reclams as $reclam)
{!! $reclam->text !!}
<div class="d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
    <img src="{{ asset($reclam->img) }}" class="img-fluid" alt="">
</div>
@endforeach