@foreach ($clubs as $club)
{{$club->club_name}}//{{$club->sumball}}
    <table>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($club->peoples as $people)
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
            </tr>
        @endforeach
    </table>
@endforeach
