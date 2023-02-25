@extends('site.index')
@section('title')

@endsection
@section('content')
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <form action="{{url('someurl')}}" method="post">
            @csrf
           <input type="text" name="someName" />
           <input type="submit">
           </form>
        {{$name}}


        <div class="table-responsive">
            <table id="example" style="width:99%" class="table table-striped table-bordered">
              <thead>
              	
                <tr>
                  <th>Дата</th>

                </tr>
              </thead>
              <tbody>                
                   @foreach ($peopless as $pipl)
                   <tr>
                   
                    <td>{{$pipl->name}}</td>
               

                   </tr>  
                   @endforeach                                   
              </tbody>
            </table>

            <table id="example" style="width:99%" class="table table-striped table-bordered">
                <thead>
                    
                  <tr>
                    <th>Дата</th>
  
                  </tr>
                </thead>
                <tbody>                
                     @foreach ($rpeopless as $pipl)
                     <tr>
                     
                      <td>{{$pipl->name}}</td>
                 
  
                     </tr>  
                     @endforeach                                   
                </tbody>
              </table>
          </div>


    </div>
</section>


@endsection