@if ($dani['stat'] == 'go')
    <meta http-equiv="refresh" content="{{$dani['time']}}">
@endif 
 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Telegram_bot</title>
    <link rel="stylesheet" href="/dist/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                @if ($dani['stat'] == 'go')
                                <button class="btn btn-success btn-lg active" type="button">Online Telegram запущений</button></div>
                                @else
                                <button class="btn btn-danger btn-lg active" type="button">Online Telegram вимкнений</button></div>
                                @endif
                        </form>                
                        Останнє оновлення о: {{date('d-m-Y h:i:s');}}
                    </div>
                </nav>
                <h3 class="text-dark mb-4"><strong>Панель керування Telegram</strong></h3>
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <div class="mb-3">
                                    @if ($dani['stat'] == 'go')
                                    <a href="stop"><button class="btn btn-danger btn-sm" type="button">Заупинити розсилку в Telegram</button></a>
                                    
                                    
                                    @else
                                    <a href="go"><button class="btn btn-success btn-sm" type="button">Запустити розсилку в Telegram</button></a>
                                    @endif
                                
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Деталі</h6>
                                </div>
                                <div class="card-body text-center shadow">
                                    <div class="mb-3">
                                        <a href="start"><button class="btn btn-primary btn-sm" type="button">Розіслати всім стартові хвилини</button></a></div>
                                        <a href="reclam"><button class="btn btn-primary btn-sm" type="button">Розіслати всім рекламку про змагання</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Кому відправлені дані про результат</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Імя в Telegram</th>
                                                            <th>Прізвище Імя</th>
                                                            <th>Результат</th>
                                                            <th>Місце</th>
                                                            <th>Група</th>
                                                            <th>Час</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($telegram as $t)
                                                          <tr>
                                                            <td>{{$t->username}}</td>
                                                            <td>{{$t->name}}</td>
                                                            <td>{{$t->rez}}</td>
                                                            <td>{{$t->mistse}}</td>
                                                            <td>{{$t->grup}}</td>
                                                            <td>{{$t->created_at}}</td>
                                                        </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Кому відправлені дані про стартові хвилини</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Імя в Telegram</th>
                                                            <th>Прізвище Імя</th>
                                                            <th>Чіп</th>
                                                            <th>Старт</th>
                                                            <th>Група</th>
                                                            <th>Час</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($telegram as $t)
                                                        <tr>
                                                          <td>{{$t->username}}</td>
                                                          <td>{{$t->name}}</td>
                                                          <td>{{$t->rez}}</td>
                                                          <td>{{$t->mistse}}</td>
                                                          <td>{{$t->grup}}</td>
                                                          <td>{{$t->created_at}}</td>
                                                      </tr>  
                                                      @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <form>
                                                <div class="mb-3"></div>
                                            </form>
                                        </div>
                                    </div> --}}
                                    <div class="card shadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Event_O2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/assets/js/theme.js"></script>
</body>

</html>
