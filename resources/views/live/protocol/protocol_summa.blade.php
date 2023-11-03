{{-- @dd($peopless) --}}
@foreach ($etaps as $etap)
    {{$etap}}//
@endforeach

@foreach ($grups as $grup)
    <table>
        @foreach ($peopless as $people)
        @if ($grup->name == $people['cls'])
            <tr>
                <td>{{$name}}</td>
            </tr>
        @endif
    @endforeach
    </table>
@endforeach


@foreach ($peopless as $name => $danis)
    {{$name}}
    @foreach ($danis as $dani)
    {{$dani->cid}}
    {{$dani->cls}}
    @endforeach
@endforeach

