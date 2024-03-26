<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="resources/sheet.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    .ritz .waffle a {
        color: inherit;
    }

    .ritz .waffle .s2 {
        background-color: #ffffff;
        text-align: center;
        color: #000000;
        font-family: 'docs-docs-Calibri', Arial;
        font-size: 12pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s7 {
        border-bottom: 1px SOLID #000000;
        border-right: 1px SOLID #000000;
        background-color: #ffffff;
        text-align: center;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s6 {
        border-bottom: 1px SOLID #000000;
        background-color: #ffffff;
        text-align: left;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s9 {
        background-color: #ffffff;
        text-align: right;
        text-decoration: underline;
        -webkit-text-decoration-skip: none;
        text-decoration-skip-ink: none;
        color: #1155cc;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s4 {
        background-color: #ffffff;
        text-align: left;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s5 {
        background-color: #ffffff;
        text-align: right;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s3 {
        background-color: #ffffff;
        text-align: center;
        font-weight: bold;
        color: #000000;
        font-family: 'docs-docs-Calibri', Arial;
        font-size: 10pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s0 {
        background-color: #ffffff;
        text-align: center;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s1 {
        background-color: #ffffff;
        text-align: center;
        font-weight: bold;
        color: #000000;
        font-family: 'docs-docs-Calibri', Arial;
        font-size: 12pt;
        vertical-align: bottom;
        white-space: normal;
        overflow: hidden;
        word-wrap: break-word;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s8 {
        background-color: #ffffff;
        text-align: left;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }
</style>
<div class="ritz grid-container" dir="ltr">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Увага!</h4>
        <p>Це сторінка відладки вашого протоколу.</p>
        <hr>
        <p class="mb-0">Переконайтеся що всім 12спортсменам  правильно нараховано ранг:</p>
        <a href="/livess/rezult/protocol_finish/{{$protocol_dani->id}}" class="btn btn-primary btn-lg mt-3">Перейти до протоколу</a>
      </div>
    <table class="waffle no-grid" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="row-header freezebar-origin-ltr"></th>
                <th id="1455815870C0" style="width:49px;" class="column-headers-background"></th>
                <th id="1455815870C1" style="width:195px;" class="column-headers-background"></th>
                @if ($protocol_dani->pol_rik)<th id="1455815870C2" style="width:120px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                {{-- <th id="1455815870C3" style="width:104px;" class="column-headers-background"></th> --}}
                @if ($protocol_dani->pol_com)<th id="1455815870C4" style="width:201px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                @if ($protocol_dani->pol_tren)<th id="1455815870C5" style="width:170px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                <th id="1455815870C6" style="width:87px;" class="column-headers-background"></th>
                <th id="1455815870C7" style="width:75px;" class="column-headers-background"></th>
                @if ($protocol_dani->pol_roz)<th id="1455815870C8" style="width:83px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                @if ($protocol_dani->pol_roz_vik)<th id="1455815870C9" style="width:67px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                @if ($protocol_dani->pol_ball)<th id="1455815870C10" style="width:66px;" class="column-headers-background"></th><?php $z=$z+1;?>@endif
                <th id="1455815870C11" style="width:100px;" class="column-headers-background"></th>
                <th id="1455815870C12" style="width:100px;" class="column-headers-background"></th>
            </tr>
            {{-- <td class="s7" dir="ltr">№ п\п</td>
            <td class="s7" dir="ltr">Прізвище, ім‘я учасника</td>
            @if ($protocol_dani->pol_rik)<td class="s7" dir="ltr">Дата народження</td>@endif
            <td class="s7" dir="ltr">Регіон</td>
            @if ($protocol_dani->pol_com)<td class="s7" dir="ltr">Клуб/Команда</td>@endif
            @if ($protocol_dani->pol_tren)<td class="s7" dir="ltr">Тренер</td>@endif
            <td class="s7" dir="ltr">Результат</td>
            <td class="s7" dir="ltr">Місце</td>
            @if ($protocol_dani->pol_roz)<td class="s7" dir="ltr">Кваліф.</td>@endif
            @if ($protocol_dani->pol_roz_vik)<td class="s7" dir="ltr">Вик. розр.</td>@endif
            @if ($protocol_dani->formula)<td class="s7" dir="ltr">Бали</td>@endif --}}
        </thead>
        <tbody>
            
                
           @if ($protocol_dani->col1)
            <tr style="height: 20px">
                <th id="1455815870R0" style="height: 20px;" class="row-headers-background">
                    <!-- <div class="row-header-wrapper" style="line-height: 20px">1</div> -->
                </th>
                <td class="s0" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->col1}}</td>
                <td></td>
                <td></td>
            </tr>
           @endif
           @if ($protocol_dani->col2)
            <tr style="height: 20px">
                <th id="1455815870R1" style="height: 20px;" class="row-headers-background">
                    <!-- <div class="row-header-wrapper" style="line-height: 20px">2</div> -->
                </th>
                <td class="s0" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->col2}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
           @if ($protocol_dani->col3)
            <tr style="height: 20px">
                <th id="1455815870R2" style="height: 20px;" class="row-headers-background">
                    <!-- <div class="row-header-wrapper" style="line-height: 20px">3</div> -->
                </th>
                <td class="s0" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->col3}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if ($protocol_dani->name1)  
            <tr style="height: 20px">
                <th id="1455815870R3" style="height: 20px;" class="row-headers-background">
                    <!-- <div class="row-header-wrapper" style="line-height: 20px">4</div> -->
                </th>
                <td class="s1" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->name1}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if ($protocol_dani->name2)
            <tr style="height: 20px">
                <th id="1455815870R4" style="height: 20px;" class="row-headers-background">
                    <!-- <div class="row-header-wrapper" style="line-height: 20px">5</div> -->
                </th>
                <td class="s2" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->name2}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if ($protocol_dani->name3)
            <tr style="height: 20px">
                <th id="1455815870R5" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">6</div> --}}
                </th>
                <td class="s3" dir="ltr" colspan="{{4+$z}}">ПРОТОКОЛ РЕЗУЛЬТАТІВ {{$protocol_dani->name3}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @if ($protocol_dani->namedist) 
            <tr style="height: 20px">
                <th id="1455815870R6" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">7</div> --}}
                </th>
                <td class="s0" dir="ltr" colspan="{{4+$z}}">{{$protocol_dani->namedist}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
            <tr style="height: 20px">
                <th id="1455815870R7" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">8</div> --}}
                </th>
                <td class="s4" dir="ltr"></td>
                <td class="s4" dir="ltr" colspan="2">{{$protocol_dani->inf_data}}</td>
                <td class="s5" dir="ltr" colspan="{{$z}}">{{$protocol_dani->inf_local}}</td>
                <td class="s4" dir="ltr"></td>
                <td class="s4" dir="ltr"></td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($class_peoples as $clas) 
            <?php $n_p_p = 0; ?>
                <tr style="height: 20px">
                    <th id="1455815870R8" style="height: 20px;" class="row-headers-background">
                        {{-- <div class="row-header-wrapper" style="line-height: 20px">9</div> --}}
                    </th>
                    <td class="s6" dir="ltr"></td>
                    <td class="s6" dir="ltr" colspan="{{1+$z}}">Вікова група <span
                            style="font-weight:bold;">{{ $clas->class_name }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Начальник дистанції: {{$protocol_dani->nd}}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Довжина дистанції: {{$clas->leng}}; 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Контрольний час:{{$protocol_dani->con}}</td>
                    <td class="s6" dir="ltr"></td>
                    <td class="s6" dir="ltr"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px">
                    <th id="1455815870R9" style="height: 20px;" class="row-headers-background">
                        {{-- <div class="row-header-wrapper" style="line-height: 20px">10</div> --}}
                    </th>
                    <td class="s7" dir="ltr">№ п\п</td>
                    <td class="s7" dir="ltr">Прізвище, ім‘я учасника</td>
                    @if ($protocol_dani->pol_rik)<td class="s7" dir="ltr">Дата народження</td>@endif
                    {{-- <td class="s7" dir="ltr">Регіон</td> --}}
                    @if ($protocol_dani->pol_com)<td class="s7" dir="ltr">Клуб/Команда</td>@endif
                    @if ($protocol_dani->pol_tren)<td class="s7" dir="ltr">Тренер</td>@endif
                    <td class="s7" dir="ltr">Результат</td>
                    <td class="s7" dir="ltr">Місце</td>
                    @if ($protocol_dani->pol_roz)<td class="s7" dir="ltr">Кваліф.</td>@endif
                    @if ($protocol_dani->pol_roz_vik)<td class="s7" dir="ltr">Вик. розр.</td>@endif
                    @if ($protocol_dani->pol_ball)<td class="s7" dir="ltr">Бали</td>@endif
                    <td class="s7" dir="ltr">РАНГ УЧАСНИКА</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($clas->peoples as $people)
                    <tr style="height: 20px">
                        <th id="1455815870R10" style="height: 20px;" class="row-headers-background">

                        </th>
                        <?php $n_p_p = $n_p_p+1; ?>
                        <td class="s0" dir="ltr">{{$n_p_p}}</td>
                        <td class="s4" dir="ltr">{{ $people->name }}</td>
                        @if ($protocol_dani->pol_rik)<td class="s0" dir="ltr">{{ $people->rik}}</td>@endif
                        {{-- <td class="s8" dir="ltr">Волинська</td> --}}
                        @if ($protocol_dani->pol_com)<td class="s4" dir="ltr">{{ $people->club_name}}</td>@endif
                        @if ($protocol_dani->pol_tren)<td class="s4" dir="ltr">{{ $people->trener}}</td>@endif
                        <td class="s0" dir="ltr">{{ $people->rezult_stat }}</td>
                        <td class="s0" dir="ltr">{{ $people->plases }}</td>
                        @if ($protocol_dani->pol_roz)<td class="s0" dir="ltr">{{ $people->roz }}</td>@endif
                        @if ($protocol_dani->pol_roz_vik)<td class="s0" dir="ltr">{{ $people->vik_roz }}</td>@endif
                        @if ($protocol_dani->pol_ball)<td class="s0" dir="ltr">{{ $people->bali }}</td>@endif
                        <td class="s0" dir="ltr">{{ $people->rang }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach

                <tr style="height: 20px">
                    <th id="1455815870R51" style="height: 20px;" class="row-headers-background">
                        {{-- <div class="row-header-wrapper" style="line-height: 20px">52</div> --}}
                    </th>
                    <td class="s4" dir="ltr"></td>
                    <td class="s4" dir="ltr" colspan="{{1+$z}}">Класс дистанції: 
                    @if ($clas->klas_dist=="dt")
                        {{$protocol_dani->cld}}
                    @endif
                    @if ($clas->klas_dist=="dor")
                        {{$protocol_dani->cldr}}
                    @endif;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ранг змагань: {{$clas->rangs}} балів.
                        @foreach ($clas->rozryad as $roz)
                        @if ($roz['nazva'])
                            
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $roz['nazva'] }} {{ $roz['vidsotki'] }} {{ $roz['time'] }};                 
                        @endif
                        @endforeach
                    </td>
                    <td class="s4" dir="ltr"></td>
                    <td class="s4" dir="ltr"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="height: 20px">
                    <th id="1455815870R53" style="height: 20px;" class="row-headers-background">
                        {{-- <div class="row-header-wrapper" style="line-height: 20px">54</div> --}}
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            <tr style="height: 20px">
                <th id="1455815870R52" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">53</div> --}}
                </th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R53" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">54</div> --}}
                </th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R54" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">55</div> --}}
                </th>
                <td></td>
                <td class="s4" dir="ltr">Головний суддя</td>
                <td class="s4" dir="ltr" colspan="{{4+$z}}">___________________{{$protocol_dani->gsu}}</td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R55" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">56</div> --}}
                </th>
                <td></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
                <td class="s4"></td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R56" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">57</div> --}}
                </th>
                <td></td>
                <td class="s4" dir="ltr">Головний секретар</td>
                <td class="s4" dir="ltr" colspan="{{4+$z}}">___________________{{$protocol_dani->gse}}</td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R57" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">58</div> --}}
                </th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="height: 20px">
                <th id="1455815870R58" style="height: 20px;" class="row-headers-background">
                    {{-- <div class="row-header-wrapper" style="line-height: 20px">59</div> --}}
                </th>
                <td class="s9" dir="ltr" colspan="{{4+$z}}"><a target="_blank"
                        href="https://event-o.net/">https://event-o.net/</a></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
