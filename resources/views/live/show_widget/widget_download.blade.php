@php
    // $grups = App\Http\Controllers\LiveRezultsController::widget_rezult($event->cid);
@endphp
<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Результати</font>
                </font>
            </h3>
            <div class="card-tools">
                @if ($event->live == 'ОНЛАЙН')
                    <span class="badge badge-warning">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Онлайн</font>
                        </font>
                    </span>
                @endif
                <a href="{{ url('/livess/rezult/' . $event->cid) }}"><button type="button" class="btn btn-tool">
                        <i class="fas fa-expand"></i>
                    </button> </a>


                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Projects <span class="float-right badge bg-primary">31</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Tasks <span class="float-right badge bg-info">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Completed Projects <span class="float-right badge bg-success">12</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Followers <span class="float-right badge bg-danger">842</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center">
            <a href="{{ url('/livess/rezult/' . $event->cid) }}">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Перейти на сторінку результатів</font>
                </font>
            </a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!--/.card -->
</div>
