<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.1.3.2 (Linux)"/>
	<meta name="author" content="Microsoft Corporation"/>
	<meta name="created" content="1996-10-09T00:32:33"/>
	<meta name="changedby" content="Forestaras"/>
	<meta name="changed" content="2019-03-02T17:13:31"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="57"></colgroup>
	<colgroup width="211"></colgroup>
	<colgroup width="118"></colgroup>
	<colgroup width="187"></colgroup>
	<colgroup width="133"></colgroup>
	<colgroup width="60"></colgroup>
	<colgroup width="68"></colgroup>
	<colgroup width="136"></colgroup>
	<colgroup width="125"></colgroup>
	<colgroup span="2" width="68"></colgroup>
	<tr>
		<td colspan=11 height="25" align="center">{{$inform['r1']}}</td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center">{{$inform['r2']}}</td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center">{{$inform['r3']}}</td>
		</tr>
	
	<tr>
		<td colspan=11 height="25" align="center"><br></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center"><b><font face="Calibri" size=3 color="#000000">{{$inform['n1']}}</font></b></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center"><font face="Calibri" size=3 color="#000000">{{$inform['n2']}}</font></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center"><font face="Calibri" size=3 color="#000000">{{$inform['n3']}}</font></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center"><br></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center"><b><font face="Calibri" color="#000000">ПРОТОКОЛ РЕЗУЛЬТАТІВ ЗМАГАНЬ З ОРІЄНТУВАННЯ У ЗАДАНОМУ НАПРЯМКУ</font></b></td>
		</tr>
	<tr>
		<td colspan=11 height="25" align="center">{{$inform['nd']}}</td>
		</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	
		
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">{{$inform['i1']}}</font></b></td>
		<td align="left"><br></td>
		<td align="center">Місце проведення</td>
		<td style="border-bottom: 1px solid #000000" colspan=1 align="center"><b><font face="Calibri" color="#000000">{{$inform['i2']}}</font></b></td>
		<td colspan=2 align="center">Начальник дистанції</td>
		<td style="border-bottom: 1px solid #000000" colspan=2 align="center"><b><font face="Calibri" color="#000000">{{$inform['i3']}}</font></b></td>
		</tr>
		@foreach ($ri as $grup)
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="center" valign=middle>Група </td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">{{$grup['grup']}}</font></b></td>
		<td align="center" valign=middle>Довжина дистанції </td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">{{$grup['legts']}}м</font></b></td>
		<td align="center" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">12 КП</font></b></td>
		<td colspan=1 align="center" valign=middle>Контрольний час </td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">60 хв</font></b></td>
	</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="51" align="center" valign=middle>№ п\п</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Прізвище, ім‘я учасника</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Клуб/ФСТ</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Тренер</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Номер учасника</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Резуль-тат</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Місце</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Кваліф.</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center">Вик. розр.</td>
		{{-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>Очки</td> --}}
	</tr>
	@foreach ($grup['rezult_people'] as $people)
		{{-- expr --}}
	
	<tr>
		<td height="20" align="center" valign=middle sdval="1" sdnum="1033;">{{$people['nam']}}</td>
		<td align="left">{{$people['name']}}</td>
		<td align="left">{{$people['comanda']}}</td>
		<td align="left">{{$people['trener']}}</td>
		<td align="center" valign=middle sdval="194" sdnum="1033;"></td>
		<td align="center" valign=middle sdval="0.00569444444444445" sdnum="1033;0;[H]:MM:SS">{{$people['rezult']}}</td>
		<td align="center" valign=middle sdval="1" sdnum="1033;">{{$people['﻿mistse']}}</td>
		<td align="center" valign=middle>{{$people['roz']}}</td>
		<td align="center">{{$people['vik']}}</td>
		{{-- <td align="center" valign=middle sdval="35" sdnum="1033;">35</td> --}}
	</tr>
	@endforeach
	
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle sdnum="1033;0;[H]:MM:SS"><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	@if ($grup['klasdist']!==0)
	
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="right" valign=middle>Клас дистанції</td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Calibri" color="#000000">{{$grup['klasdist']}}</font></b></td>
		<td align="left"><br></td>
		<td align="right" valign=middle>Ранг змагань</td>
		<td style="border-bottom: 1px solid #000000" colspan=2 align="center"><b><font face="Calibri" color="#000000">{{$grup['rang_grup']}} б.</font></b></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>

	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	@if ($grup['roz_tab'])
	@foreach ($grup['roz_tab'] as $roz)
		
	
	
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="center"><b><font face="Calibri" color="#000000">{{$roz['roz_name']}}</font></b></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle sdval="1.08" sdnum="1033;0;0%">{{$roz['roz_proz']}}%</td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle sdval="0.00615" sdnum="1033;0;H:MM:SS;@">{{$roz['timeo']}}</td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left" sdnum="1033;0;H:MM:SS;@"><br></td>
	</tr>
	@endforeach
	@endif
	@endif
	@if ($grup['klasdist']==0)
		<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	@endif

	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	@endforeach
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="left"><br></td>
		<td align="left">Головний суддя</td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><b><font face="Calibri" color="#000000">{{$inform['s1']}}</font></b></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><b><font face="Calibri" color="#000000"><br></font></b></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="left"><br></td>
		<td align="left">Головний секретар</td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><b><font face="Calibri" color="#000000">{{$inform['s2']}}</font></b></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><b><font face="Calibri" color="#000000"><br></font></b></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left">Контролер</td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><b><font face="Calibri" color="#000000">{{$inform['s3']}}</font></b></td>
		<td style="border-bottom: 1px solid #000000" align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="25" align="center" valign=middle><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><b><font face="Calibri" color="#000000"><br></font></b></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="center"><br></td>
		<td align="left"><br></td>
	</tr>
	
</table>
<!-- ************************************************************************** -->
</body>

</html>
