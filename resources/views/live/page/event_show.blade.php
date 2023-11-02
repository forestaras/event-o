@extends('live.includ.index')
@section('title')
    ---{{ $event->title }}---Результати
@endsection
@section('page')
    {{ $event->title }}
@endsection

@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/livess/') }}">Головна</a>/{{ $event->title }}</li>
@endsection
@section('content')
    <div class="col-md-9">


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">



                                    <li class="nav-item">
                                        @if ($_GET['g'] == 'inform' or !$_GET)
                                            <a class="nav-link active" href="?g=inform">Інформація</a>
                                        @else
                                            <a class="nav-link" href="?g=inform">Інформація</a>
                                        @endif
                                    </li>
                                    @foreach ($event->onlines as $online)
                                        <li class="nav-item">
                                            @if ($_GET['g'] == $online->id)
                                                <a class="nav-link active"
                                                    href="?g={{ $online->id }}">{{ $online->datestart }}</br>{{ $online->name }}</a>
                                            @else
                                                <a class="nav-link"
                                                    href="?g={{ $online->id }}">{{ $online->datestart }}</br>{{ $online->name }}</a>
                                            @endif

                                        </li>
                                    @endforeach
                                    {{-- <li class="nav-item"><a class="nav-link text-center" href="#settings"
                                            data-toggle="tab">23.05.2023</br>Довга</a>
                                    </li> --}}
                                </ul>
                            </div>



                            <div class="card-body">

                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        @if ($_GET['g'] == 'inform' or !$_GET)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Інформація</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">




                                                                    {{-- <h5>Інформація:</h5> --}}
                                                                    <p>Дата початку: <b>{{ $event->datastart }}</b></p>
                                                                    <p>Місце проведення: <b>{{ $event->location }}</b></p>
                                                                    <p>Організатор: <b>{{ $event->org }}</b></p>
                                                                    @if ($event->obl->title !== null)
                                                                        <div>
                                                                            <p>Область: <img src="/{{ $event->obl->flag }}"
                                                                                    alt="Paris" width="auto"
                                                                                    height="30px"><b>{{ $event->obl->title }}</b>

                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                    @if ($event->club->title !== null)
                                                                        <p>Клуб: <img src="/{{ $event->club->logo }}"
                                                                                alt="Paris" width="auto"
                                                                                height="30px"><b>{{ $event->club->title }}</b>
                                                                        </p>
                                                                    @endif


                                                                    <!-- /.row -->



                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Контактна інформація</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">




                                                                    {{-- <h5>Інформація:</h5> --}}
                                                                    @if ($event->contact_name || $event->contact_email || $event->contact_phone || $event->contact_website)
                                                                        <div class="phone">

                                                                            @if ($event->contact_name)
                                                                                <p> <b>{{ $event->contact_name }}</b></p>
                                                                            @endif
                                                                            @if ($event->contact_email)
                                                                                <p>Email:
                                                                                    <b>{{ $event->contact_email }}</b>
                                                                                </p>
                                                                            @endif
                                                                            @if ($event->contact_phone)
                                                                                <p>Телефон:
                                                                                    <b>{{ $event->contact_phone }}</b>
                                                                                </p>
                                                                            @endif
                                                                            @if ($event->contact_website)
                                                                                <p><b><a
                                                                                            href="{{ $event->contact_website }}">Вебсайт</a></b>
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    @endif


                                                                    <!-- /.row -->



                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card card-success shadow-lg">

                                                        <div class="card-header">
                                                            <h3 class="card-title">Реєстрація</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="card-body p-0">
                                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                                                @foreach ($event->registersetings as $registerseting)
                                                                    <li class="item">

                                                                        <a href="javascript:void(0)"
                                                                            class="product-title">{{ $registerseting->title }}
                                                                            {{-- {{ date_format(date_create($registerseting->datestop), 'd-m-Y') }} --}}
                                                                            <span
                                                                                class="badge badge-warning float-right">{{ date_format(date_create($registerseting->datestop), 'd-m-Y') }}</span></a>
                                                                        @if ($registerseting->grup)
                                                                            <span class="product-description">
                                                                                <b>Групи:</b>
                                                                                @foreach ($registerseting->grups as $grup)
                                                                                    <small class="badge badge-success">
                                                                                        {{ $grup }}</small>
                                                                                @endforeach
                                                                            </span>
                                                                        @endif
                                                                        @if ($registerseting->club)
                                                                            <span class="product-description">
                                                                                <b>Команди:</b>
                                                                                @foreach ($registerseting->club as $club)
                                                                                    <small class="badge badge-success">
                                                                                        {{ $club }}</small>
                                                                                @endforeach
                                                                            </span>
                                                                        @endif

                                                                        <span class="product-description">
                                                                            @if (date_format(date_create($registerseting->datestop), 'U') > date('U'))
                                                                                <a class="btn bg-success float-left"
                                                                                    href="/event/register/{{ $registerseting->id }}">
                                                                                    <i class="fas fa-users"></i>
                                                                                    Зареєструватись
                                                                                    <span
                                                                                        class="badge bg-purple">до:{{ date_format(date_create($registerseting->datestop), 'd-m-Y H:i:s') }}</span>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    class="btn btn-danger btn-flat float-left disabled">
                                                                                    <i
                                                                                        class="fas fa-exclamation-triangle"></i>
                                                                                    Реєстрацію закрито!!!!
                                                                                    <span
                                                                                        class="badge bg-purple">{{ date_format(date_create($registerseting->datestop), 'd-m-Y H:i:s') }}</span>
                                                                                </a>
                                                                            @endif
                                                                            <a class="btn bg-warning float-right"
                                                                                href="/event/register/{{ $registerseting->id }}">
                                                                                <i class="fas fa-users"></i> Зареєстровані
                                                                                <span
                                                                                    class="badge bg-purple">{{ $registerseting->count }}</span>
                                                                            </a>
                                                                        </span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card card-primary shadow-none">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Додатково </h3>

                                                            <div class="card-tools">

                                                                <button type="button" class="btn btn-tool">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                </button>
                                                            </div>
                                                            <!-- /.card-tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body" style="display: block;">

                                                            @foreach ($event->link as $link)
                                                                <b><a href="{{ $link->text }}">
                                                                        {{ $link->titlesilka }}
                                                                    </a></b><br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                <div class="card card-success shadow-sm">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Shadow - Small</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        The body of the card
                                                    </div>
                                                </div>
                                            </div> --}}
                                            </div>
                                    </div>
                                    @endif



                                    @foreach ($event->onlines as $online)
                                        @if ($_GET['g'] == $online->id)
                                            <div class="tab-pane" id="online{{ $online->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($online->sponsor)
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">Спонсор
                                                                            </font>
                                                                        </font>
                                                                    </h3>
                                                                    <div class="card-tools">
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <img src="/{{ $online->sponsor }}" class="img-fluid"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if ($online->inf)
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">
                                                                                Інформація
                                                                                про
                                                                                день
                                                                            </font>
                                                                        </font>
                                                                    </h3>
                                                                    <div class="card-tools">
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div>
                                                                        <div class="direct-chat-msg">
                                                                            <span class="direct-chat-name float-left">
                                                                                <font style="vertical-align: inherit;">
                                                                                    {!! $online->inf !!}
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="col-md-6">

                                                        @if ($online->detali)
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">Програма
                                                                                дня
                                                                            </font>
                                                                        </font>
                                                                    </h3>
                                                                    <div class="card-tools">
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div>
                                                                        <div class="direct-chat-msg">
                                                                            <span class="direct-chat-name float-left">
                                                                                <font style="vertical-align: inherit;">
                                                                                    {!! $online->detali !!}
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if ($online->rezult or $online->starovi or $online->split)
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Результати і
                                                                            стартові
                                                                        </font>
                                                                    </font>
                                                                </h3>
                                                                <div class="card-tools">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div>
                                                                    <div class="direct-chat-msg">
                                                                        <span class="direct-chat-name float-left">
                                                                            <font style="vertical-align: inherit;">
                                                                                <div id="event_update_results_content_62295"
                                                                                    class="text p-4">
                                                                                    @if ($online->starovi)
                                                                                        <p><strong><a href="/livess/start/{{ $online->id }}">Стартові:</a></strong><br>
                                                                                            <font
                                                                                                style="vertical-align: inherit;">
                                                                                                @foreach ($online->grups as $grup)
                                                                                                    @if ($grup->start == 1)
                                                                                                        <a
                                                                                                            href="/livess/start/{{ $online->id }}#{{ $grup->name }}">{{ $grup->name }}</a>|
                                                                                                    @else
                                                                                                        {{ $grup->name }}|
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </font>
                                                                                    @endif
                                                                                    @if ($online->rezult)
                                                                                        <p><strong><a href="/livess/rezult/{{ $online->id }}">Результати
                                                                                                онлайн:</a></strong><br>
                                                                                            <font
                                                                                                style="vertical-align: inherit;">
                                                                                                @foreach ($online->grups as $grup)
                                                                                                    @if ($grup->rezult == 1)
                                                                                                        <a
                                                                                                            href="/livess/rezult/{{ $online->id }}#{{ $grup->name }}">{{ $grup->name }}</a>|
                                                                                                    @else
                                                                                                        {{ $grup->name }}|
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </font>
                                                                                    @endif
                                                                                    @if ($online->split)
                                                                                        <p><strong><a href="/livess/split/{{ $online->id }}">Спліти:</a></strong><br>
                                                                                            <font
                                                                                                style="vertical-align: inherit;">
                                                                                                @foreach ($online->grups as $grup)
                                                                                                    @if ($grup->rezult == 1)
                                                                                                        <a
                                                                                                            href="/livess/split/{{ $online->id }}?grup={{ $grup->name }}">{{ $grup->name }}</a>|
                                                                                                    @else
                                                                                                        {{ $grup->name }}|
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </font>
                                                                                    @endif





                                                                                </div>



                                                                            </font>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if ($online->comandni)
                                                            @include('live.show_widget.widget_comand')
                                                        @endif
                                                        
                                                        @if ($online->startclok)
                                                            @include('live.show_widget.widget_start_cloks')
                                                        @endif


                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
