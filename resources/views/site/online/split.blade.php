@extends('site.index')
@section('title')
---{{ $event->name }}---Спліти
@endsection

@section('content')
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
</style>
 <section id="portfolio  pricing" class="portfolio  pricing">
      <div class="container" data-aos="fade-up">
        <div class="jumbotron box featured row">
          <div class="col-lg-9">
            <h1>Спліти: {{ $event->name }}</h1>
            <p>Дата змагань: {{ date_format(date_create($event->date), 'd.m.Y') }}<br>
                Учасників: {{ $event->count_people }}<br>
                Команд: {{ $event->count_club }}</p>
            <p><a class="buy-btn" href="/online/startlist/{{ $event->cid }}?sort=grup"
                    role="button">Стартлист</a>
                <a class="buy-btn" href="/online/rezult/{{ $event->cid }}?sort=grup"
                    role="button">Результати</a>
                {{-- <a class="buy-btn" href="/online/split/{{ $event->cid }}?sort=grup" role="button">Спліти</a> --}}
            </p>
            {{-- <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="" @if ($_GET['sort'] == 'grup' or !$_GET) class="filter-active" @endif><a href="?sort=grup">Групи</a></li>
                <li data-filter="" @if ($_GET['sort'] == 'club' or !$_GET) class="filter-active" @endif><a href="?sort=club">Клуби</a></li>
                <li data-filter="" @if ($_GET['sort'] == 'tsah' or !$_GET) class="filter-active"@endif><a href="?sort=tsah">Шахматка</a></li> --}}
            </ul>
          </div>
          <div class="col-lg-2">
            <a class="btn btn-primary btn-lg" href="#" OnClick="history.back();"role="button"><i class="fas fa-undo-alt"></i>Назад</a>
          </div>
        </div>

        <h3>{{$grup}}</h3>
        <div class="row content">
            <div class="col-md-6">



        	
            </div>
       


        </div>
        @foreach($grupss as $grupa)
        <a href="/online/split/{{$id}}?grup={{$grupa->name}}">{{$grupa->name}}</a>|
        @endforeach
        <table  class="table table-striped table-bordered split">
          <tr>
            <td>Місце</td>
            <td>Імя</td>
            <td>Результат</td>
            @foreach($mopkp as $kp)<td>{{$kp->ctrl}}</td>@endforeach
            
            <td>Фініш</td>
            <td>Результат</td>
            <td>Імя</td>
            


          </tr>
           @foreach($people_rezult as $people)
          <tr>  
            <td>{{$people['mistse']}}</td>
            <td><b>{{$people['name']}}</b><br>{{$people['club']}}</td>
            <td><b>{{$people['result']}}</b><br>{{$people['vidst']}}</td>
            @foreach($people['split'] as $split)

                
           
            <td><abbsss id="color{{$split['count_all']}}"title="{{$split['time_vidst_rt']}}">{{$split['time']}} ({{$split['count_all']}})</abbsss> <br>
            <abbsss id="color{{$split['count_cp']}}"title="{{$split['time_vidst_rt_peregon']}}">{{$split['time_peregon']}}({{$split['count_cp']}})</abbsss><br>
            
          </td>
          

            @endforeach
            <td>{{$people['finish']}}<br>
                {{$people['rt_peregon']}}
            </td>  
          <td><b>{{$people['result']}}</b><br>{{$people['vidst']}}</td>
          <td><b>{{$people['name']}}</b><br>{{$people['club']}}</td>
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
@foreach($mopkp as $kp) 
  '{{$kp->ctrl}}', 
  @endforeach
  'Фініш',
];
const data = {
  labels: labels,
  datasets: [
  @foreach($people_rezult as $people) 
  @if($people['stat']==1)
  {
    label: '{{$people['mistse']}}.{{$people['name']}}',
    backgroundColor: "{{$people['color']}}",
    borderColor: "{{$people['color']}}",
    data: [0,@foreach($people['split'] as $split) -{{$split['rttt']}},@endforeach],

  },
  @endif
   @endforeach
   {
    label: 'СуперМен',
    backgroundColor: '#66ff33',
    borderColor: '#66ff33',
    data: [0,@foreach($mopkp as $kp) 0,@endforeach],
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

<!-- /.График -->



 









          </div>
      </div>      

  </section>
@endsection