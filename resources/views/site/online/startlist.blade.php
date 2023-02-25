@extends('site.index')
@section('title')
---{{ $event->name }}---Стартові
@endsection
@section('content')
    <section id="portfolio pricing" class="portfolio pricing">
        <div class="container" data-aos="fade-up">
          <div class="jumbotron box featured row">
            <div class="col-lg-10">
              <h1>Стартовий протокол: {{ $event->name }}</h1>
              <p>Дата змагань: {{ date_format(date_create($event->date), 'd.m.Y') }}<br>
                  Учасників: {{ $event->count_people }}<br>
                  Команд: {{ $event->count_club }}</p>
              {{-- <p><a class="buy-btn" href="/online/startlist/{{ $event->cid }}?sort=grup"
                      role="button">Стартлист</a> --}}
                  <a class="buy-btn" href="/online/rezult/{{ $event->cid }}?sort=grup"
                      role="button">Результати</a>
                  <a class="buy-btn" href="/online/split/{{ $event->cid }}?sort=grup" role="button">Спліти</a>
              </p>
              <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="" @if ($_GET['sort'] == 'grup' or !$_GET) class="filter-active" @endif><a href="?sort=grup">Групи</a></li>
                  <li data-filter="" @if ($_GET['sort'] == 'club' or !$_GET) class="filter-active" @endif><a href="?sort=club">Клуби</a></li>
                  <li data-filter="" @if ($_GET['sort'] == 'tsah' or !$_GET) class="filter-active"@endif><a href="?sort=tsah">Шахматка</a></li>
              </ul>
            </div>
            <div class="col-lg-2">
              <a class="btn btn-primary btn-lg" href="#" OnClick="history.back();"role="button"><i class="fas fa-undo-alt"></i>Назад</a>
            </div>
          </div>
            

            
      

            <div class="table-responsive">
                @if ($_GET['sort'] == 'grup')
                    @foreach ($grups as $grup)
                        <p id="{{ $grup->name }}">
                            <br>
                            <br>
                            <br>
                            <br>
                        </p>

                        @foreach ($grups as $grupa)
                            <a href="#{{ $grupa->name }}">{{ $grupa->name }}</a>|
                        @endforeach
                        <h3>{{ $grup->name }}</h3>

                        <table id="my" style="width:99%" class="table table-striped table-bordered">
                            <thead>
                                <!-- {{ $events }} -->
                                <tr>
                                    <th>#п.п</th>
                                    <th>SI</th>
                                    <th>Імя</th>
                                    <th>Команда,клуб</th>

                                    <th>Старт</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 0; ?>
                                @foreach ($peoples as $people)
                                    @if ($grup->name == $people['cls'])
                                        <?php $x = $x + 1; ?>
                                        <tr>

                                            <td> {{ $x }}</td>
                                            <td> {{ $people['si'] }}</td>
                                            <td><a
                                                    href="/online/showpeople/{{ $people['name'] }}">{{ $people['name'] }}</a>
                                            </td>
                                            <th><a href="?sort=club#{{ $people['org'] }}">{{ $people['org'] }}</a></th>

                                            <td>{{ $people['start'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach



                            </tbody>
                        </table>
                    @endforeach
                @endif



                @if ($_GET['sort'] == 'club')
                    @foreach ($clubs as $club)
                        <p id="{{ $club->name }}">
                            <br>
                            <br>
                            <br>
                            <br>
                        </p>

                        @foreach ($clubs as $cluba)
                            <a href="#{{ $cluba->name }}">{{ $cluba->name }}</a>|
                        @endforeach
                        <h3>{{ $club->name }}</h3>

                        <table id="my" style="width:99%" class="table table-striped table-bordered">
                            <thead>
                                <!-- {{ $events }} -->
                                <tr>
                                    <th>#п.п</th>
                                    <th>SI</th>
                                    <th>Імя</th>
                                    <th>Група</th>
                                    <th>Старт</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 0; ?>
                                @foreach ($peoples as $people)
                                    @if ($club->name == $people['org'])
                                        <?php $x = $x + 1; ?>
                                        <tr>
                                            <td> {{ $x }}</td>
                                            <td> {{ $people['si'] }}</td>
                                            <td><a
                                                    href="/online/showpeople/{{ $people['name'] }}">{{ $people['name'] }}</a>
                                            </td>
                                            <th><a href="?sort=grup#{{ $people['cls'] }}">{{ $people['cls'] }}</a></th>
                                            <td>{{ $people['start'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach



                            </tbody>
                        </table>
                    @endforeach
                @endif



                @if ($_GET['sort'] == 'tsah')
                    <table id="my" style="width:99%" class="table table-striped table-bordered">
                        <thead>
                            <!-- {{ $events }} -->
                            <tr>
                                <th>#п.п</th>
                                <th>SI</th>
                                <th>Імя</th>
                                <th>Група</th>
                                <th>Клуб</th>
                                <th>Старт</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 0; ?>
                            @foreach ($peoples as $people)

                                <?php $x = $x + 1; ?>
                                <tr>
                                    <td> {{ $x }}</td>
                                    <td> {{ $people['si'] }}</td>
                                    <td><a href="/online/showpeople/{{ $people['name'] }}">{{ $people['name'] }}</a></td>
                                    <th><a href="?sort=grup#{{ $people['cls'] }}">{{ $people['cls'] }}</a></th>
                                    <th><a href="?sort=club#{{ $people['org'] }}">{{ $people['org'] }}</a></th>

                                    <td>{{ $people['start'] }}</td>
                                </tr>

                            @endforeach



                        </tbody>
                    </table>
                @endif

            </div>
        </div>

    </section>
@endsection
