@php
    $seting = App\Http\Controllers\LiveRezultsController::seting();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <h2><a class="text-light" href="/">{{ CRUDBooster::getSetting('appname') }}</a>
            </h2>
        </li>

    </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->   
        @foreach ($seting['menus'] as $menu)
            <li class="nav-item d-none d-sm-inline-block float-right">
                <b><a class="nav-link" href="{{ $menu->path }}" class="nav-link active">{{ $menu->name }}</a></b>
            </li>
        @endforeach
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" data-target="#main-header-search" href="#"
                role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block" id="main-header-search">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can

                            </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> --}}
        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item dropdown">
            @if (CRUDBooster::myName())
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-users"></i><b>{{ CRUDBooster::myName() }}</b>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Суперадмін</span>
                <div class="dropdown-divider"></div>
                <a href="/admin/event19" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Мої змагання
                    <span class="float-right text-muted text-sm">25</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/admin/users/profile" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Редагуати профіль
                    {{-- <span class="float-right text-muted text-sm">12 hours</span> --}}
                </a>
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item ">
                    <i class="fas fa-file mr-2"></i> Вийти
                    <span class="float-right text-muted text-sm">2 days</span>
                </a> --}}
                <div class="dropdown-divider"></div>
                <a href="/admin" class="dropdown-item dropdown-footer">Панель керування</a>
            </div>
            @endif
        </li>
        @if (!CRUDBooster::myName())
        <li class="nav-item d-none d-sm-inline-block float-right">
            <b><a class="nav-link" href="{{ route('getLogin') }}" class="nav-link active">Увійти</a></b>
        </li>
        @endif
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
    </ul>
    <div>
</nav>
