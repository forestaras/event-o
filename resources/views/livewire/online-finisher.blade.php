<div wire:poll.5000ms class="row">
    <div class="col-12 col-sm-12 col-md-12">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
        <div class="info-box-content">
         @foreach ($pe as $p)
          <span class="info-box-text"> {{$p->name}} <a href="{{url('/livess/online/'.$cid.'/'.$p->cls)}}">{{$p->grup}}</a> {{$p->rez}}  <a href="#">({{$p->club}})</a></span>
          @endforeach
        </div>
      </div>
    </div>
</div>