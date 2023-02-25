<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> {{ $dani->title }}
                                <small class="pull-right">Дата: {{ $dani->datastart }}</small>
                            </h2>
                        </div>

                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            ПРО
                            <address>
                                Місце проведення:<strong>{{ $dani->location }}</strong><br>
                                Область:<strong>{{ $obl }}</strong><br>
                                Клуб організатор:<strong>{{ $club }}</strong><br>
                                Організатор:<strong>{{ $dani->org }}</strong><br>
                                Створено:<strong>{{ $stvoreno }}</strong><br>
                                Головний суддя:<strong>{{ $golsud }}</strong><br>
                                Секретар:<strong>{{ $secretar }}</strong><br>
                                Редактор:<strong>{{ $redactor }}</strong><br>
                            </address>
                        </div>


                        <div class="col-sm-6 invoice-col">
                            Контактні дані
                            <address>
                                Контактна особа:<strong>{{ $dani->contact_name }}</strong><br>
                                email:<strong>{{ $dani->contact_email }}</strong><br>
                                Контактний телефон:<strong>{{ $dani->contact_phone }}</strong><br>
                                Фейсбук:<strong>{{ $dani->contact_fb }}</strong><br>
                                Сайт:<strong>{{ $dani->contact_website }}</strong><br>
                            </address>
                        </div>

                    </div>
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a class="btn btn-info " href="/event/{{ $dani->id }}">
                                <i class="fa fa-newspaper-o"></i> Перейти на сторінку</a>
                            <a class="btn btn-warning " href="/admin/event19/edit/{{ $dani->id }}">
                                <i class="fa fa-pencil-square-o"></i> Редагувати</a>
                            <a class="btn btn-danger"  onclick="return confirm('Ви впевнені що хочете видалити дані змагання?')" href="/admin/event19/delete/{{ $dani->id }}">
                                <i class="fa fa-trash"></i> Видалити</a>
                               
                                
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Реєстрація учасників</h3>
                        <div class="box-tools">
                            <a class="btn btn-success btn-sm" href="/admin/registerseting/add/?event={{$dani->id}}">
                                <i class="fa fa-plus-square"></i> Створити реєстрацію</a>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Дата реєстрації</th>
                                    <th>Назва</th>
                                    <th>Тренер</th>
                                    <th>Клуб</th>
                                    <th>Область</th>
                                    <th>Розряд</th>
                                    <th>SI</th>
                                    <th>Рік</th>
                                    <th>Групи</th>
                                    <th>Дні</th>
                                    {{-- <th>ЗАРЕЄСТРОВАНО</th> --}}
                                </tr>
                                @foreach ($registersetings as $registerseting)
                                    <tr>
                                        <td>{{ $registerseting->datestop }}</td>
                                        <th scope="row">{{ $registerseting->title }}</th>
                                        <td>
                                            @if ($registerseting->trener)
                                                ✓
                                            @endif
                                        </td>
                                        <td>
                                            @if ($registerseting->club)
                                                ✓
                                            @endif
                                        </td>
                                        <td>
                                            @if ($registerseting->obl)
                                                ✓
                                            @endif
                                        </td>
                                        <td>
                                            @if ($registerseting->roz)
                                                ✓
                                            @endif
                                        </td>
                                        <td>
                                            @if ($registerseting->si)
                                                ✓
                                            @endif
                                        </td>
                                        <td>
                                            @if ($registerseting->rik)
                                                ✓
                                            @endif
                                        </td>
                                        <td>{{ $registerseting->grup }}</td>
                                        <td>{{ $registerseting->dni }}</td>

                                        {{-- <td><span class="badge bg-yellow">235</span></td> --}}
                                        <td>
                                            <a class="btn btn-warning btn-xs"
                                                href="/admin/registerseting/edit/{{ $registerseting->id }}">
                                                <i class="fa fa-pencil-square-o"></i> Редагувати</a>

                                            <a class="btn btn-warning btn-xs"
                                                href="/admin/register/add/?registerid={{ $registerseting->id }}&show=admin">
                                                <i class="fa fa-list-alt"></i> Редагувати
                                                зареєстрованих</a>

                                            <a class="btn btn-primary btn-xs"
                                                href="/event/registers/exportmeos/{{ $registerseting->id }}">
                                                <i class="fa fa-file-code-o"></i> Експорт даних для MEOS</a>


                                            <a class="btn btn-danger btn-xs"
                                            onclick="return confirm('Ви впевнені що хочете видалити реєстрацію?')"
                                                href="/admin/registerseting/delete/{{ $registerseting->id }}">
                                                <i class="fa fa-trash"></i> Видалити</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Онлайн</h3>
                        <div class="box-tools">
                            <a class="btn btn-success btn-sm" href="/admin/online/add/?event={{ $dani->id }}">
                                <i class="fa fa-plus-square"></i> Створити онлайн</a>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="col">Назва онлайну</th>
                                    <th scope="col">Дата початку</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">ID онлайну</th>
                                    <th scope="col">Пароль</th>
                                </tr>
                                @foreach ($onlines as $online)
                                    <tr>
                                        <td>{{ $online->name }}</td>
                                        <td>{{ $online->datestart }}</td>
                                        <td>http://evento.zzz.com.ua/public/live/update.php</td>
                                        <td>{{ $online->id }}</td>
                                        <td>{{ $online->cod }}</td>
                                        <td><a class="btn btn-warning btn-xs"
                                                href="/admin/online/edit/{{ $online->id }}">
                                                <i class="fa fa-pencil-square-o"></i> Редагувати</a>
                                            <a class="btn btn-danger btn-xs"
                                            onclick="return confirm('Ви впевнені що хочете видалити онлайн?')"
                                                href="/admin/online/delete/{{ $online->id }}">
                                                <i class="fa fa-trash"></i> Видалити</a>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Посилання</h3>
                        <div class="box-tools">
                            <a class="btn btn-success btn-sm" href="/admin/eventdop/add/?event={{ $dani->id }}">
                                <i class="fa fa-plus-square"></i>Додати посилання</a>
                        </div>
                    </div>
                   


                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="col">Лінк</th>
                                    <th scope="col">URL</th>
                                </tr>
                                @foreach ($links as $link)
                                    <tr>
                                        <th scope="row"><a href="{{ $link->text }}">{{ $link->titlesilka }}</a>
                                        </th>
                                        <td>{{ $link->text }}</td>
                                        <td><a class="btn btn-warning btn-xs"
                                                href="/admin/eventdop/edit/{{ $link->id }}">
                                                <i class="fa fa-pencil-square-o"></i> Редагувати</a>
                                            <a class="btn btn-danger btn-xs"
                                            onclick="return confirm('Ви впевнені що хочете видалити посилання?')"
                                                href="/admin/eventdop/delete/{{ $link->id }}">
                                                <i class="fa fa-trash"></i> Видалити</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </section>
@endsection
