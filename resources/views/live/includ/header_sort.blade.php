<div class="col-12 col-sm-12 col-md-12">
    <div class=" float-left btn-group ">
        @if ($_GET['sort'] == 'club')
            <h3>Коанди</h3>
        @endif
        @if ($_GET['sort'] == 'obl')
            <h3>Область</h3>
        @endif

        @if ($_GET['sort'] == 'grup' or !$_GET['sort'])
            <h3>Групи</h3>
        @endif
        @if ($_GET['sort'] == 'sah')
            <h3>Шахматка</h3>
        @endif
    </div>

    <div class=" float-right btn-group ">
        <button type="button" class="btn btn-warning">Сортувати</button>
        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown"
            aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu" style="">
            @if ($_GET['sort'] != 'grup' or !$_GET['sort'])
                <a class="dropdown-item" href="?sort=grup#">Групи</a>
            @endif

            @if ($_GET['sort'] != 'club')
                <a class="dropdown-item" href="?sort=club#">Коанди</a>
            @endif

            @if ($_GET['sort'] != 'sah' and Route::is('start'))
                <a class="dropdown-item" href="?sort=sah#">Шахматка</a>
            @endif
  
            @if ($_GET['sort'] != 'obl' and Route::is('register'))
                <a class="dropdown-item" href="?sort=obl#">Область</a>
            @endif


            {{-- <div class="dropdown-divider"></div> --}}
            {{-- <a class="dropdown-item" href="#">Separated link</a> --}}
        </div>
    </div>
</div>
