@extends('live.includ.index')
@section('title')
    ---{{ $event->name }}---Результати
@endsection
@section('page')
    Спортсмени
@endsection
@section('map_site')
    <li class="breadcrumb-item"><a href="{{ url('/livess/') }}">Головна</a>/<a
            href="{{ url('/livess/show/' . $event->cid) }}">{{ $event->name }}</a>Спортсмени</li>
@endsection
@section('content')
    <div class="col-md-9">
        <!-- MAP & BOX PANE -->
        
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> {{$dani->name}}
                        <small class="float-right">Дата народження: {{$dani->rik}}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    {{-- Клуб: {{$dani->club}} --}}
                    <address>
                        Клуб: <strong>{{$dani->clu}}</strong><img src="/{{$dani->club->logo}}" alt="{{$dani->club->title}}" height="50px"><br>
                        Область: <strong>{{$dani->obl->title}}</strong><img src="/{{$dani->obl->logo}}" alt="{{$dani->obl->title}}" height="50px"><br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    
                    <address>
                        Розряд: <strong>{{$dani->roz}}</strong><br>
                        Група: </strong>{{$dani->grup}}</strong><br>
                       
                        
                    </address>
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    @if ($dani->si>0)
                      SportIdent: <b>{{$dani->si}}</b><br>  
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Дата</th>
                                <th>Назва</th>
                                <th>Клуб</th>
                                <th>Група</th>
                                <th>Місце</th>
                                <th>Результат</th>
                                <th>Відст</th>
                                <th>Більше</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peoples as $people)
                            @if ($people->mistse == 1)
                            <tr class="table-success">
                            @elseif ($people->mistse == 2)
                            <tr class="table-warning">
                            @elseif ($people->mistse == 3)
                            <tr class="table-danger">
                            @else
                            <tr>
                        @endif
                                <td>{{$people->event->date}}</td>
                                <td><a href="/livess/show/{{$people->cid}}">{{$people->event->name}}</a></td>
                                <td><a href="/livess/rezult/{{$people->cid}}?sort=club#{{$people->club}}">{{$people->club}}</a></td>
                                <td><a href="/livess/rezult/{{$people->cid}}#{{$people->grup}}">{{$people->grup}}</a></td>
                                <td>{{$people->mistse}}</td>
                                <td>{{$people->rez}}</td>
                                <td>{{$people->vid}}</td>
                                <td><a href="/livess/rezult/{{$people->cid}}"><button class="btn btn-primary btn-sm"><b>Результати</b></button></a></td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    
            {{-- <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
    
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>
    
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$250.30</td>
                                </tr>
                                <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                            class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                </div>
            </div> --}}
        </div>
        <!-- /.card -->

        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->

        <!-- /.card -->
    </div>
@endsection
