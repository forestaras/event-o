<?php
$cid=43;//айді змагань.
$time_onovlennya="42";//час оновлення сторінки.
$osob=10;//кількість учасників яким рахуються бали.

$formball=100; // число яке вставляється в формулу
$osob=$osob-1;




function formyla ($timeper,$timepipl,$ball)// час переможця,час учасника/число яке вставляється в формулу.
	{
		$rezult=100*($timeper/$timepipl);
		return $rezult;
	}

$namedey1='42';
$namedey2='';
$namedey3='';


$popbal1=[];

$popbal2=[];

?>
