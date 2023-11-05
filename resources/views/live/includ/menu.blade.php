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
    <ul class="navbar-nav ml-auto ">
        <!-- Navbar Search -->   
        @foreach ($seting['menus'] as $menu)
            <li class="nav-item d-none d-sm-inline-block float-right dropdown">
                <b><a class="nav-link" href="{{ $menu->path }}" class="nav-link active">{{ $menu->name }}</a></b>
            </li>
        @endforeach
             
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
        <li class="nav-item dropdown">
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
