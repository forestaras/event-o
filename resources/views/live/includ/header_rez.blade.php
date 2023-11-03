<div class="card-header">
    <h2 class="card-title">{{ $eventseting->title }}
        <b>
            @if (Route::is('start'))
                Стартові
            @endif
            @if (Route::is('rezult'))
                Результати
            @endif
            @if (Route::is('comandni'))
                Командні
            @endif
            @if (Route::is('split'))
                Спліти
            @endif

            <a href="{{ route('event', $online->eventid) }}?g={{ $online->id }}">{{ $online->name }}
                @if (!$online->name)
                    {{ $event->name }}
                @endif
            </a>
        </b>
    </h2>



    <div class="card-tools">
        <button type="button" class="btn btn-tool">
            <a href="javascript:history.back()" title="Назад"><i class="fas fa-arrow-left"></i></a>
        </button>

        @if (!Route::is('start') and $online->starovi)
            <button type="button" class="btn btn-tool">
                <a href="{{ route('start', $event->cid) }}" title="Стартові"><i class="far fa-file-alt"></i>Старт</a>
            </button>
        @endif

        @if (!Route::is('split') and $online->split)
            <button type="button" class="btn btn-tool">
                <a href="{{ route('split' , $event->cid) }}" title="Спліти"><i class="fas fa-poll-h"></i>Спліт</a>
            </button>
        @endif

        @if (!Route::is('rezult') and $online->rezult)
            <button type="button" class="btn btn-tool">
                <a href="{{ route('rezult' , $event->cid) }}" title="Результати"><i class="fa fa-list"></i>Результ</a>
            </button>
        @endif

        @if (!Route::is('comandni') and $online->comandni)
            <button type="button" class="btn btn-tool">
                <a href="{{ route('comand' , $event->cid) }}" title="Командні"><i class="fas fa-user-friends"></i>Командні</a>
            </button>
        @endif

        <button type="button" class="btn btn-tool">
            <a href="#" onclick="parent.location.reload(); return false;" title="Оновити"><i class="fas fa-sync-alt"></i></a>
        </button>
    </div>
</div>
