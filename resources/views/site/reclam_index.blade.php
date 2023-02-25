<div class="container" data-aos="fade-up">
    {{-- <div class="section-title">
          <h2>Календар</h2>
        </div> --}}
        @if ($blocs->events->count() > 0)
            
        
    <div class="card card-widget widget-user-2 shadow-sm">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-warning">
            {{-- <div class="widget-user-image">
                <img class="img-circle elevation-2" src="" alt="User Avatar">
              </div> --}}
            <!-- /.widget-user-image -->
            {{-- <h3 class="widget-user-username">На цьому тиждні</h3> --}}
            <h5>Незабаром</h5>
        </div>
        <div class="card-footer p-0" style="font-size:0.7em">
            <ul class="nav flex-column">
                @foreach ($blocs->events as $event)
                    <li class="nav-item" style="">
                        <a href="/event/{{ $event->id }}" class="nav-link">
                            {{ $event->title }} <span
                                class="float-right badge {{ $event->color }}">{{ $event->data }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif





    @foreach ($blocs->reclams as $reclam)
    <a href="{{$reclam->url}}">
        {!! $reclam->text !!}
        <div class="d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset($reclam->img) }}" class="img-fluid" alt="">
        </div>
      </a>
    @endforeach
</div>
