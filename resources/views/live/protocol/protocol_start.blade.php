@foreach ($class_peoples as $clas)
{{$clas->class_name}}
    <table>
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
                <td>{{ $people->start }}</td>
                <td>{{ $people->clyb_name }}</td>
                <td>{{ $people->status }}</td>
                <td>{{ $people->status }}</td>
                <td>{{ $people->rezult_stat }}</td>
                <td>{{ $people->bali }}</td>
            </tr>
        @endforeach
    </table>
@endforeach