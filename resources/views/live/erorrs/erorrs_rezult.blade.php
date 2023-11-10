@extends('live.includ.index')
@section('title')
    ---{{ $online->name }}---
    @if (Route::is('start'))
        Стартові
    @endif
    @if (Route::is('rezult'))
        Результати
    @endif
    @if (Route::is('comand'))
        Командні
    @endif
    @if (Route::is('split'))
        Спліти
    @endif
@endsection
@section('page')
    Онлайн центр
@endsection

@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Головна</a>/
        <a href="{{ url('/show/' . $eventseting->id) }}">{{ $eventseting->title }}</a>/
        <a href="{{ url('/livess/show/' . $online->id) }}">{{ $online->name }}</a>/
        @if (Route::is('start'))
            Стартові
        @endif
        @if (Route::is('rezult'))
            Результати
        @endif
        @if (Route::is('comand'))
            Командні
        @endif
        @if (Route::is('split'))
            Спліти
        @endif
    </li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title">{{ $eventseting->title }} <b>
                        @if (Route::is('start'))
                            Стартові
                        @endif
                        @if (Route::is('rezult'))
                            Результати
                        @endif
                        @if (Route::is('comand'))
                            Командні
                        @endif
                        @if (Route::is('split'))
                            Спліти
                        @endif <a
                        href="{{ route('event' , $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}</a>
                    </b></h2>

                <div class="card-tools">






                </div>
            </div>
            {{-- <div class="col-12 col-sm-12"> --}}
            <div class="card-body row">
                <div class="error-page">
                    <h2 class="headline text-danger">!!!</h2>

                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> 
                            @if (Route::is('start'))
        Стартових
    @endif
    @if (Route::is('rezult'))
        Результатів
    @endif
    @if (Route::is('comand'))
        Командних
    @endif
    @if (Route::is('split'))
        Сплітів
    @endif поки немає! </h3>

                        <p>

                            Тут зʼявляться 
                            @if (Route::is('start'))
                            cтартові
                        @endif
                        @if (Route::is('rezult'))
                            результати
                        @endif
                        @if (Route::is('comand'))
                            командні
                        @endif
                        @if (Route::is('split'))
                            спліти
                        @endif змагань, одразу після того, як їх буде опубліковано організаторами! <a
                                href="{{ url('/event/' . $online->eventid) }}?g={{ $online->id }}">Вернутися назад.</a>
                            <a href="#" onclick="parent.location.reload(); return false;">Оновити сторінку.</a>
                        </p>


                    </div>
                </div>

            </div>

            {{-- <div>
                    <button type="button" class="btn btn-block btn-success">Success</button>
                <p class="my-3">Показати результати і стартові по
                    @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
                    <a href="?sort=club" class="btn btn-sm btn-info float-left">Команди</a>
                        <a href="?sort=club">КОМАНДАХ</a>
                    @endif
                    @if ($_GET['sort'] == 'club')
                        <a href="?sort=grup">ГРУПАХ</a>
                    @endif
                </div> --}}
            {{-- </div> --}}

            <!-- /.card-header -->


            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
