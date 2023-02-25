<!doctype html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      </head>
  <body>
    <div class="container">
        <h2>{{$event->name}}</h2>
        @foreach ($grups as $grup)
        {{-- <a href="?grup">{{$grup->name}}</a> --}}
            
        @endforeach
<table  class="table table-striped" >
    <thead>
    <tr>
        <th>Команда<br>час</th>
        <th>Сума балів</th>
        <th>КП<br>Час взяття</th>
    </tr>
</thead>
@foreach ($peopless as $people)
<tbody>

<tr>
    <td>{{$people->name}}<br>{{$people->rez}}</td>
    <td>{{$people->sum}}</td>
@foreach ($people->cp as $cp)
<td>{{$cp->ctrl}}({{$cp->bal}})<br>{{$cp->rez}}</td> 
@endforeach
{{-- <td>{{$people->rez}}</td> --}}

</tr>
</tbody> 
   
@endforeach

</table>
</div>
</body>
</html>