<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competitions Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div>
        {{ $CPevent->name }}
        @if (!$CPevent->name)
            <form action="{{ route('competition.store') }}" method="POST">
        @endif
        @if ($CPevent->name and $_GET['d'] == 'edit')
            <form method="POST" action="{{ route('competition.update', $CPevent->id) }}" role="form"
                enctype="multipart/form-data">
                {{-- <form action="{{ route('competition.update', $CPevent->id) }}" method="POST">         --}}
                @method('PUT')
        @endif
        {{-- {{ method_field('PATCH') }} --}}
        @csrf <!-- Захист від CSRF-атак -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Назва</label>
                <input type="text" class="form-control" id="name" name="name"
                    @if ($CPevent->name) value="{{ $CPevent->name }}" @if ($CPevent->d != 'edit') disabled @endif
                    @endif>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Дата</label>
                <input type="date" class="form-control" id="data" name="data"
                    @if ($CPevent->name) value="{{ $CPevent->data }}" @if ($CPevent->d != 'edit') disabled @endif
                    @endif>
            </div>

            <div class="form-group col-md-4">
                <label for="inputPassword4">Пароль</label>
                <input type="text" class="form-control" id="pass" name="pass"
                    @if ($CPevent->name) value="{{ $CPevent->pass }}" @if ($CPevent->d != 'edit') disabled @endif
                    @endif>
            </div>
        </div>
        @if ($CPevent->name and $_GET['d'] != 'edit')
            <a href="create?CPevent={{ $CPevent->id }}&d=edit">Редагувати
            </a>
        @endif
        @if ($CPevent->name and $_GET['d'] == 'edit')
            <button type="submit" class="btn btn-primary">Зберегти</button>
        @endif
        @if (!$CPevent->name)
            <button type="submit" class="btn btn-primary">Зберегти</button>
        @endif

        </form>
        @if ($CPevent->name)

           
               

                @if (!$_GET['c'])
                    <form action="{{ route('competition.store') }}" method="POST">
                @endif
                @if ($_GET['c'])
                <form method="POST" action="{{ route('competition.update', $CPcpedit->id) }}" role="form"
                    enctype="multipart/form-data">
                    @method('PUT')
                @endif
                @csrf
                <input type="hidden" name="dia" value="cp">
                <input type="hidden" name="cid" value="{{ $CPevent->id }}">
                @if (!$_GET['c'])
                    <input type="hidden" name="cod" value="{{ rand(10000, 99999) }}">
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Назва</label>
                        <input type="text" class="form-control" id="name" name="name"
                            @if ($_GET['c']) value="{{ $CPcpedit->name }}" @endif>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Бали</label>
                        <input type="text" class="form-control" id="data" name="ball"
                            @if ($_GET['c']) value="{{ $CPcpedit->ball }}" @endif>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Зберегти</button>

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Назва КП</th>
                        <th scope="col">Кількість білів</th>
                        <th scope="col">код</th>
                        <th scope="col">qr</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($CPcps as $CPcp)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $CPcp->name }}</td>
                            <td>{{ $CPcp->ball }}</td>
                            <td>{{ $CPcp->cod }}</td>
                            <td>{!! QrCode::size(50)->generate($CPcp->cod) !!}</td>
                            {{-- <td></td> --}}
                            <td>
                                <a href="create?CPevent={{ $CPevent->id }}&c={{$CPcp->id}}"><button
                                        class="btn btn-primary">Редагувати</button></a>
                            </td>
                            <td>
                                <a href=""><button class="btn btn-primary">Видалити</button></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif

        <form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Група</th>
                        <th scope="col">31</th>
                        <th scope="col">32</th>
                        <th scope="col">33</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><input type="text" class="form-control" id="name"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td>
                        <td>
                            <a href=""><button class="btn btn-primary">Редагувати</button></a>
                        </td>
                        <td>
                            <a href=""><button class="btn btn-primary">Видалити</button></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ч-21</td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                checked disabled></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                disabled>
                        </td>
                        <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                disabled>
                        </td>
                        <td>
                            <a href=""><button class="btn btn-primary">Редагувати</button></a>
                        </td>
                        <td>
                            <a href=""><button class="btn btn-primary">Видалити</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>


    </div>


</body>

</html>
