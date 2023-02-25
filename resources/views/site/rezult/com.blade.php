<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<body>

<!-- ************************************************************************** -->
<hr>
<A NAME="table1"><h1>Sheet 2: <em>Лист2</em></h1></A>
<table cellspacing="0" border="0">
	<colgroup width="107"></colgroup>
	<colgroup span="2" width="194"></colgroup>
	<colgroup width="171"></colgroup>
	<colgroup width="172"></colgroup>
	<colgroup width="136"></colgroup>
	<colgroup width="75"></colgroup>
	<tr>
		<td colspan=7 height="19" align="center" valign=middle><font face="Arial" color="#000000">КЗ &quot;Волинський обласний центр національно-патріотичного виховання, туризму і краєзнавства учнівської молоді Волинської обласної ради&quot;</font></td>
		</tr>
	<tr>
		<td colspan=7 height="19" align="center" valign=middle><b><font size=3 color="#000000">XXI обласні змагання зі спортивного орієнтування серед учнівської та студентської молоді</font></b></td>
		</tr>
	<tr>
		<td colspan=7 height="19" align="center" valign=middle><font size=3 color="#000000">&quot;Волинська осінь&quot;</font></td>
		</tr>
	<tr>
		<td colspan=7 height="19" align="center" valign=middle><b><font color="#000000">ПРОТОКОЛ КОМАНДНИХ РЕЗУЛЬТАТІВ ЗМАГАНЬ З ОРІЄНТУВАННЯ У ЗАДАНОМУ НАПРЯМКУ</font></b></td>
		</tr>
	<tr>
		<td colspan=7 height="19" align="center" valign=middle><font face="Arial" color="#000000">Середня</font></td>
		</tr>
	<tr>
		<td height="19" align="center" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="center" valign=middle sdval="44495" sdnum="1033;0;M/D/YYYY"><b><font color="#000000">10/26/2021</font></b></td>
		<td align="center" valign=middle sdnum="1033;0;M/D/YYYY"><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=middle><font face="Arial" color="#000000">Місце проведення</font></td>
		<td style="border-bottom: 2px solid #000000" align="center" valign=middle><b><font color="#000000">с.Масловець</font></b></td>
		<td align="center" valign=middle><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="center" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" height="19" align="center" valign=middle><font face="Arial" color="#000000">Місце команди</font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">Команда</font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">Сума балів</font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">Місце</font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">Прізвище Ім'я учасників</font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">Група </font></td>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000">Бали</font></td>
	</tr>
    <?php
        $y=0;
        ?>
    @foreach ( $clubs as $club )
    <?php
        $y++;
        ?>
        <tr>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=11 height="190" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Arial" color="#000000">{{$y}}</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=11 align="center" valign=middle><b><font face="Arial" color="#000000">{{$club->name}}</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=11 align="center" valign=middle sdval="958" sdnum="1033;"><b><font face="Arial" color="#000000">{{round($club->sumball, 2)}}</font></b></td>
		
	    </tr>
        <?php
        $x=1;
        ?>
        @foreach ( $peopless as $people )
        
        @if ($club->id==$people->org and $x <= 10)
        <?php
        $x=$x+1;
        ?> 
            
       
        <tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle sdval="2" sdnum="1033;"><font face="Arial" color="#000000">{{$people->mistse}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000">{{$people->name}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Arial" color="#000000">{{$people->cls_name}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle sdval="0.0212731481481481" sdnum="1033;0;0.00"><font face="Arial" color="#000000">{{round($people->bali,2)}}</font></td>
	    </tr>
         @endif
         
        @endforeach
        @while ($x<=10)
        <?php
        $x=$x+1;
        ?> 
        <tr>
        </tr>
             
         @endwhile
	    
    @endforeach
	

	<tr>
		<td height="19" align="center" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="center" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000">Головний суддя</font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font color="#000000">Корнійчук А.М.</font></b></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><b><font color="#000000"><br></font></b></td>
		<td align="left" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000">Головний секретар</font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font color="#000000">Климчук А.А.</font></b></td>
		<td style="border-bottom: 2px solid #000000" align="left" valign=middle sdnum="1033;0;0.00"><font face="Arial" color="#000000"><br></font></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>

@foreach ($clubs as $club)
{{$club->name}}
{{$club->sumball}}  
@foreach ($peopless as $people)
    @if ($people->org==$club->id)
    <br>
        {{$people->name}}
        {{$people->bali}}
    @endif
@endforeach
@endforeach