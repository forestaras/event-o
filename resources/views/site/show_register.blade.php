
@extends('site.index')
@section('title')
---{{$registerseting->title}}---список зареєстрованих
@endsection
@section('content')
 <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{$registerseting->title}}</h2>
          <p>Сторінка перегляду зареєстрованих на змагання. Ви можете відсортувати за групами областями або командами, скориставшись фільтром. Для того щоб зареєструватися на дані змагння перейдіть за посиланням "Зареєструватися на ці змагання."</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter=""  @if($_GET['sort']=='grup'  or !$_GET) class="filter-active"@endif ><a href="?sort=grup">Групи</a></li>
          @if($registerseting->club)<li data-filter="" @if($_GET['sort']=='club') class="filter-active"@endif><a href="?sort=club">Клуби</a></li>@endif
          @if($registerseting->obl)<li data-filter="" @if($_GET['sort']=='obl') class="filter-active"@endif><a href="?sort=obl">Область</a></li>@endif
        </ul>
        <div class="row content">
            <div class="col-md-6">


        	ЗАРЕЄСТРОВАНО: {{$event->countreg}} <br>
        	КІНЕЦЬ РЕЄСТРАЦІЇ: {{date_format(date_create($registerseting->datestop), 'd.m.Y H:i:s')}}<br>
        	@if(date_format(date_create($registerseting->datestop), 'U') > date('U'))  
        	<a href="/admin/register/add/?registerid={{$registerseting->id}}" type="button" class="btn btn-success">Зареєструватися</a>
        	@else
        	РЕЄСТРАЦІЮ ЗАКРИТО!!!
            @endif
            </div>
            <div class="col-md-6">
            	<a href="/event/{{$registerseting->eventid}}">Сторінка змагань</a>
            </div>


         </div>
 <!--        	 <div class="col-md-6">
              <a href="?yerstart=2020">@if($_GET['yerastart']=='2020')<b>@endif 2020</b></a>|
              <a href="?yerastart=2021">@if($_GET['yerastart']=='2021')<b>@endif 2021</b></a></div>
            <div class="col-md-6">       --> 
        @if($_GET['sort']=='grup' or !$_GET)
            @foreach($event->grup as $grup)
            @if ($event->where('grup',$grup)->count()>0)
                
           
            <p id="{{$grup}}">
            	<br>
            	<br>
            	<br>
            	<br>	
            </p>
        	@foreach($event->grup as $grups)
        	 
           @if ($event->where('grup',$grups)->count()>0)
           <a href="#{{$grups}}">{{$grups}}|</a>  
           @else
           {{$grups}}|         
           @endif
        	@endforeach
            

          <div class="table-responsive">
            <table id="examp" style="width:99%" class="table table-striped table-bordered">
              <thead>
              	
              	<h3>{{$grup}}</h3>

                <tr>
                <th>N п.п</th>
                <th>Прізвище Ім'я </th>
                @if($registerseting->rik)<th>Дата</th>@endif
                @if($registerseting->roz)<th>Розряд</th>@endif
                @if($registerseting->club)<th>Клуб</th>@endif
                @if($registerseting->obl)<th>Область</th>@endif
                @if($registerseting->tren)<th>Тренер</th>@endif
                @if($registerseting->si)<th>ЧіпSI</th>@endif
                @if($registerseting->dni)<th>Дні</th>@endif
                </tr>
              </thead>
              <tbody>         
                   <?php $x=0;?>       
                   @foreach ($event as $ev)
                   @if(($ev->grup==$grup))
                   <?php $x=$x+1;?>
                   <tr>
                   	<td>{{$x}}</td>
                   	<td>{{$ev->name}}</td>
                @if($registerseting->rik)<th>{{date_format(date_create($ev->rik), 'Y')}}</th>@endif
                @if($registerseting->roz)<th>{{$ev->roz}}</th>@endif
                @if($registerseting->club)<th><a href="?sort=club#{{$ev->club}}">{{$ev->club}}</a></th>@endif
                @if($registerseting->obl)<th><a href="?sort=obl#{{$ev->obl}}">{{$ev->obl}}</a></th>@endif
                @if($registerseting->tren)<th>{{$ev->tren}}</th>@endif
                @if($registerseting->si)<th>{{$ev->si}}</th>@endif
                @if($registerseting->dni)<th>{{$ev->dni}}</th>@endif
                      
                    
                                
                   </tr>  
                   @endif
                   @endforeach                                   
              </tbody>
            </table>
        </div>
        @endif
            @endforeach
            @endif













       @if($_GET['sort']=='obl')
            @foreach($event->obl as $obl)
            <p id="{{$obl}}">
            	<br>
            	<br>
            	<br>
            	<br>	
            </p>
        	@foreach($event->obl as $obls)
        	 <a href="#{{$obls}}">{{$obls}}</a>|
        	@endforeach
            

          <div class="table-responsive">
            <table id="examp" style="width:99%" class="table table-striped table-bordered">
              <thead>
              	
              	<h3>{{$obl}}</h3>

                <tr>
                <th>N п.п</th>
                <th>Прізвище Ім'я </th>
                @if($registerseting->rik)<th>Дата</th>@endif
                @if($registerseting->roz)<th>Розряд</th>@endif
                @if($registerseting->club)<th>Клуб</th>@endif
                @if($registerseting->grup)<th>Група</th>@endif
                @if($registerseting->tren)<th>Тренер</th>@endif
                @if($registerseting->si)<th>ЧіпSI</th>@endif
                @if($registerseting->dni)<th>Дні</th>@endif
                </tr>
              </thead>
              <tbody>         
                   <?php $x=0;?>       
                   @foreach ($event as $ev)
                   @if(($ev->obl==$obl))
                   <?php $x=$x+1;?>
                   <tr>
                   	<td>{{$x}}</td>
                   	<td>{{$ev->name}}</td>
                @if($registerseting->rik)<th>{{date_format(date_create($ev->rik), 'Y')}}</th>@endif
                @if($registerseting->roz)<th>{{$ev->roz}}</th>@endif
                @if($registerseting->club)<th><a href="?sort=club#{{$ev->club}}">{{$ev->club}}</a></th>@endif
                @if($registerseting->grup)<th><a href="?sort=grup#{{$ev->grup}}">{{$ev->grup}}</a></th>@endif
                @if($registerseting->tren)<th>{{$ev->tren}}</th>@endif
                @if($registerseting->si)<th>{{$ev->si}}</th>@endif
                @if($registerseting->dni)<th>{{$ev->dni}}</th>@endif
                      
                    
                                
                   </tr>  
                   @endif
                   @endforeach                                   
              </tbody>
            </table>
        </div>
            @endforeach
            @endif


















            @if($_GET['sort']=='club')
            @foreach($event->club as $club)
            <p id="{{$club}}">
            	<br>
            	<br>
            	<br>
            	<br>	
            </p>
        	@foreach($event->club as $clubs)
        	 <a href="#{{$clubs}}">{{$clubs}}</a>|
        	@endforeach
            

          <div class="table-responsive">
            <table id="examp" style="width:99%" class="table table-striped table-bordered">
              <thead>
              	
              	<h3>{{$club}}</h3>

                <tr>
                <th>N п.п</th>
                <th>Прізвище Ім'я </th>
                @if($registerseting->rik)<th>Дата</th>@endif
                @if($registerseting->roz)<th>Розряд</th>@endif
                @if($registerseting->obl)<th>Область</th>@endif
                @if($registerseting->grup)<th>Група</th>@endif
                @if($registerseting->tren)<th>Тренер</th>@endif
                @if($registerseting->si)<th>ЧіпSI</th>@endif
                @if($registerseting->dni)<th>Дні</th>@endif
                </tr>
              </thead>
              <tbody>         
                   <?php $x=0;?>       
                   @foreach ($event as $ev)
                   @if(($ev->club==$club))
                   <?php $x=$x+1;?>
                   <tr>
                   	<td>{{$x}}</td>
                   	<td>{{$ev->name}}</td>
                @if($registerseting->rik)<th>{{date_format(date_create($ev->rik), 'Y')}}</th>@endif
                @if($registerseting->roz)<th>{{$ev->roz}}</th>@endif
                @if($registerseting->obl)<th><a href="?sort=obl#{{$ev->obl}}">{{$ev->obl}}</a></th>@endif
                @if($registerseting->grup)<th><a href="?sort=grup#{{$ev->grup}}">{{$ev->grup}}</a></th>@endif
                @if($registerseting->tren)<th>{{$ev->tren}}</th>@endif
                @if($registerseting->si)<th>{{$ev->si}}</th>@endif
                @if($registerseting->dni)<th>{{$ev->dni}}</th>@endif
                      
                    
                                
                   </tr>  
                   @endif
                   @endforeach                                   
              </tbody>
            </table>
        </div>
            @endforeach
            @endif
          
        </div>
      
    </section>
@endsection