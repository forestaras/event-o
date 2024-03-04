
@foreach ($class_peoples as $clas)
<br>
{{$clas->class_name}}
{{-- {{$clas->rang}} --}}
{{-- {{$clas->best_time}} --}}
{{-- {{$clas->rozryad}} --}}

    <table border="2px">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($clas->peoples as $people)
            <tr>
                <td>{{ $people->plases }}</td>
                <td>{{ $people->name }}</td>
                <td>{{ $people->class_name }}</td>
                <td>{{ $people->rezult }}</td>
                <td>{{ $people->clyb_name }}</td>
                <td>{{ $people->status }}</td>
                <td>{{ $people->status }}</td>
                <td>{{ $people->rezult_stat }}</td>
                <td>{{ $people->bali }}</td>
                {{-- <td>{{ $people->rozryad }}</td> --}}
                <td>{{ $people->roz }}</td>
                <td>{{ $people->rang}}</td>
                <td>{{ $people->vik_roz}}</td>


            </tr>
        @endforeach

    </table>
    @foreach ($clas->rozryad as $roz)
    {{$roz['nazva']}}
    {{$roz['vidsotki']}}
    {{$roz['time']}}
        
    @endforeach
@endforeach
