@php
    $dani = App\Http\Controllers\LiveRezultsController::dani();
@endphp
<div class="row">
    <div class="col-3 col-sm-6 col-md-3">

        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-compass"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Результатів всього</span>
                <span class="info-box-number">
                    {{ $dani['all_event'] }}

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-3 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">На цьому тижні</span>
                <span class="info-box-number">
                    {{ $dani['week_event'] }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-3 col-sm-6 col-md-3">

        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-braille"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Зараз в онлайні</span>
                <span class="info-box-number"> {{ $dani['dey_event'] }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-3 col-sm-6 col-md-3">

        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Фінішувало людей всього</span>
                <span class="info-box-number"> {{ $dani['all_people'] }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<!-- /.col -->
