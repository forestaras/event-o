@extends('site.index')
@section('title')
    -Календар-{{ $obltitle->title }}
@endsection
@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-year-calendar/1.1.1/css/bootstrap-year-calendar.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css'>


    <!-- partial:index.partial.html -->
    <div class="text-center">
        <h2>
            Календар
            @if ($_GET['obl'] == 0)
                Всі
            @else
                {{ $obltitle->title }}
            @endif

        </h2>
    </div>
    <div class="row content">
        <div class="col-md-6">
            <a href="?obl=0">ВСІ</a>
            @foreach ($obls as $obl)
                <a href="?obl={{ $obl->id }}">{{ $obl->title }}</a>|
            @endforeach
        </div>

        <div id="calendar"></div>
        <div class="modal modal-fade" id="event-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <p>
                            <h3 id="title">Event title</h3>
                            </p>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="address">

                            <i class="icofont-google-map"></i>
                            <h4>Інформація:</h4>
                            <p>Дата початку: <b id="start">kd;fs</b></p>
                            <p>Дата закінчення: <b id="finish">kd;fs</b></p>
                            <p>Місце проведення: <b id="local">kd;fs</b></p>
                            <p>Область: <b id="obl">kd;fs</b></p>
                            <p>Організатор: <b id="org">;lk;greg</b></p>


                        </div>





                    </div>
                    <div class="modal-footer">
                        <p id="url"></p>
                        {{-- <button type="button"href="fff" class="btn btn-primary">На сторінку змагань</button> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  

    <!-- partial -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js'></script>

    <script>
        function editEvent(event) {
            $('#event-modal input[name="event-index"]').val(event ? event.id : '');
            $('#event-modal input[name="event-name"]').val(event ? event.name : '');
            $('#event-modal input[name="event-location"]').val(event ? event.location : '');
            $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
            $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
            $('#event-modal').modal();
        }

        function deleteEvent(event) {
            var dataSource = $('#calendar').data('calendar').getDataSource();
            for (var i in dataSource) {
                if (dataSource[i].id == event.id) {
                    dataSource.splice(i, 1);
                    break;
                }
            }

            $('#calendar').data('calendar').setDataSource(dataSource);
        }

        function saveEvent() {
            var event = {
                id: $('#event-modal input[name="event-index"]').val(),
                name: $('#event-modal input[name="event-name"]').val(),
                location: $('#event-modal input[name="event-location"]').val(),
                startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
                endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
            }

            var dataSource = $('#calendar').data('calendar').getDataSource();
            if (event.id) {
                for (var i in dataSource) {
                    if (dataSource[i].id == event.id) {
                        dataSource[i].name = event.name;
                        dataSource[i].location = event.location;
                        dataSource[i].startDate = event.startDate;
                        dataSource[i].endDate = event.endDate;
                    }
                }
            } else {
                var newId = 0;
                for (var i in dataSource) {
                    if (dataSource[i].id > newId) {
                        newId = dataSource[i].id;
                    }
                }

                newId++;
                event.id = newId;

                dataSource.push(event);
            }

            $('#calendar').data('calendar').setDataSource(dataSource);
            $('#event-modal').modal('hide');
        }
        $(function() {
            var currentYear = new Date().getFullYear();
            $('#calendar').calendar({
                enableContextMenu: true,
                enableRangeSelection: true,
                contextMenuItems: [{
                    text: 'Update',
                    click: editEvent
                }, {
                    text: 'Delete',
                    click: deleteEvent
                }],
                clickDay: function(e) {
                    if (e.events.length > 0) {
                        var content = '';

                        for (var i in e.events) {
                            $('#event-modal').modal();
                            $('#start').html(' ');
                            $('#finish').html(' ');
                            $('#title').html(' ');
                            $('#local').html(' ');
                            $('#obl').html(' ');
                            $('#org').html(' ');
                            $('#url').html(' ');

                            $('#url').html('<a class="btn btn-primary" href="/event/' + e.events[i].id +
                                '" role="button">На сторінку змагань</a>');
                            $('#start').html(e.events[i].start);
                            $('#finish').html(e.events[i].finish);
                            $('#title').html(e.events[i].name);
                            $('#local').html(e.events[i].local);
                            $('#obl').html(e.events[i].obl);
                            $('#org').html(e.events[i].org);
                            $('#p').html('<div class="event-tooltip-content">' +
                                '<div class="event-name" style="color:' + e.events[i].color +
                                '"> <h3>' + e.events[i].name + '</h3></div>' +
                                '<div class="event-location">' + e.events[i].location + '</div>' +
                                '</div>');
                            //    alert('Click on day ' + e.events[i].name); 

                        }
                    }

                },
                mouseOnDay: function(e) {
                    if (e.events.length > 0) {
                        var content = '';

                        for (var i in e.events) {
                            content += '<div class="event-tooltip-content">' +
                                '<div class="event-name" style="color:' + e.events[i].color + '">' + e
                                .events[i].name + '</div>' + '<div class="event-location">' + e.events[
                                    i].location + '</div>' + '</div>';
                        }

                        $(e.element).popover({
                            trigger: 'manual',
                            container: 'span',
                            html: true,
                            content: content
                        });

                        $(e.element).popover('show');
                    }
                },
                mouseOutDay: function(e) {
                    if (e.events.length > 0) {
                        $(e.element).popover('hide');
                    }
                },
                dayContextMenu: function(e) {
                    $(e.element).popover('hide');
                },
                dataSource: [

                    @foreach ($event as $even)
                        {
                            id: '{{ $even->id }}',
                            name: '{{ $even->title }}',
                            location: '{{ $even->obl->title }}{{ $even->location }}',
                            local: '{{ $even->location }}',
                            obl: '{{ $even->obl->title }}',
                            org: '{{ $even->org }}',
                            startDate: new Date({{ $even->ys }}, {{ $even->ms }},
                                {{ $even->ds }}),
                            start: '{{ $even->ds }}.{{ $even->ms }}.{{ $even->ys }}',
                            endDate: new Date({{ $even->yf }}, {{ $even->mf }},
                                {{ $even->df }}),
                            finish: '{{ $even->df }}.{{ $even->mf }}.{{ $even->yf }}'
                        },
                    @endforeach


                ]
            });

            $('#save-event').click(function() {
                saveEvent();
            });
        });
    </script>
    <script src='/calendar/dist/bootstrap-year-calendar.js'></script>
    
  </div>
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
@endsection
