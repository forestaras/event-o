@php
  header("refresh: 60");  
@endphp

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 

    <!-- Bootstrap CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/assets/css/bootstrap.min.css" > --}}
    <link rel="stylesheet" href="/public/css/my.css" >
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>{{$event->name}}</title>
  </head>
  <body>
    <h1>Командні попередні результати</h1>
    <h2>{{$event->name}}</h2>
  <p>{{$event->date}}</p>
@foreach ($clubs as $club)

    

   <a href="#" data-toggle="popover" title="{{$club->mistse}}.{{$club->name}}" data-content="{{$club->people}}">  
   <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">{{$club->mistse}}.{{$club->name}}  {{$club->count_fifnsh}}з{{$club->count_start}}</div>
  <div class="progress-bar bg-success" role="progressbar" style="width: {{$club->bal_vits}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">{{$club->sumball}} 
    </div>

  

  


  
    </div>
 </a>
@endforeach
  <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>