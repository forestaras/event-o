<?php
include_once("functions_mz.php");
include_once("config.php");
header("refresh: $time_onovlennya");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mop3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql4 = "SELECT id, name, rt, cls,org,stat FROM mopteam WHERE cid=$cid";
$r = $conn->query($sql4);
if ($r->num_rows > 0) {
	$vid="mopteam";
	}
	 else{
    $vid="mopcompetitor";
    }
$sql = "SELECT id, name, rt, cls,org,stat FROM $vid WHERE cid=$cid";
$sq2 = "SELECT id, name FROM moporganization WHERE cid=$cid";
$sq3 = "SELECT id, name, date FROM mopcompetition WHERE cid=$cid";
$result3 = $conn->query($sq3);
$nazva = $result3->fetch_assoc();

$result2 = $conn->query($sq2);
if ($result2->num_rows > 0) {
  // output data of each row
  while($rou = $result2->fetch_assoc()) {
  	
  	$club[]=[
    "id" => $rou["id"],
    "name" => $rou["name"],];	
  }
} else {
  echo "0 results";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	if ($row["rt"]!=0 and $row["stat"]==1 ) {
  	$people[]=[
    "id" => $row["id"],
    "name" => $row["name"],
    "rt" => $row["rt"],
    "cls" => $row["cls"],
    "org" => $row["org"],
    "stat"=> $row["stat"],
     ]; 
     }
    
     	$allpipl[]=[
        "id" => $row["id"],
        "name" => $row["name"],
         "rt" => $row["rt"],
         "cls" => $row["cls"],
         "org" => $row["org"],
         "stat"=> $row["stat"],
     ]; 
  	 
  	
  }
} else {
  echo "0 results";
}
$conn->close();
$rt  = array_column($people, 'rt');
$cls = array_column($people, 'cls');
array_multisort($cls, SORT_ASC, $rt, SORT_ASC, $people);
foreach ($people as $p) {
	if($p['cls']!==$clm) {
		
		$mt[]=["res"=>$p['rt'],"gr"=>$p['cls']];
	}
	$clm=$p['cls'];		
}
foreach ($people as $key) {
	foreach ($mt as $grupa) {
		if($key['cls']==$grupa['gr']){
			$vit=formyla ($grupa['res'],$key['rt'],$formball);
		$peoples[]=[ "id" => $key["id"],
    "name" => $key["name"],
    "rt" => $key["rt"],
    "cls" => $key["cls"],
    "org" => $key["org"],
    "vids"=>$vit];
	    }
	}
	// echo $key['name'].$vit.'<br>';
$vids  = array_column($peoples, 'vids');
array_multisort($vids, SORT_DESC, $peoples);
}
foreach ($club as $clubs) {
	$clubbal=0;
	$kil=0;
	$pb=0;
	foreach ($peoples as $pipl) {
		if($clubs['id']==$pipl['org']){
			if ($kil<=$osob) {
				$ppp=$pipl['vids'];
				if ($ppp<0) {
					$ppp=0;
				}
				
				$clubbal=$clubbal+$ppp;
			}
			
			$kil=$kil+1;
		}		
	}
	$allkil=0;
	foreach ($allpipl as $allr) {
		if($clubs['id']==$allr['org']){
			$allkil=$allkil+1;
			if ($allr['stat']==20 ||$allr['stat']==21 ||$allr['stat']==3 ||$allr['stat']==4 ||$allr['stat']==5 ||$allr['stat']==6 ||$allr['stat']==99 ) {
				$kil=$kil+1;
			}
		}		
	}
	foreach ($popbal1 as $popbals) {
		if ($clubs['id']==$popbals['id']) {
			$pb1=$popbals['bal'];
		}
	}
   foreach ($popbal2 as $popbals2) {
		if ($clubs['id']==$popbals2['id']) {
			$pb2=$popbals2['bal'];
		}
	}

	$sum=$pb1+$pb2+$clubbal;





	$clubresult[]=['club'=>$clubs['name'],'bal'=>$clubbal,'kil'=>$kil,'allkil'=>$allkil,'popbal1'=>$pb1,
	'popbal2'=>$pb2,'sumball'=>$sum,];
	$pb1=0;
	$pb2=0;
}


$ba  = array_column($clubresult, 'sumball');
$cl = array_column($clubresult, 'club');
array_multisort($ba, SORT_DESC, $cl, SORT_DESC, $clubresult);
// foreach ($clubresult as $c) {
	// echo $c['club']." ".round($c['bal'],2)." ".$c['kil']." ".$c['allkil'].'<br>';
// }

// var_dump($clubresult);
// var_dump($peoples);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/my.css" >

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Командні попередні результати</h1>
    <h2><? echo $nazva['name']?> </h2>
  <p><? echo $nazva['date']?> </p>
    <?php
      foreach ($clubresult as $c) {
      	$pop1vit=0;
      	$pop2vit=0;
      	$ballvit=0;
      	if (!$sum2) {
      		$max=$c['sumball'];
      	}
      	$mistse=$mistse+1;
      	$sum2=$c['bal'];
      	$pop1vit=75/$max*$c['popbal1'];
      	$pop2vit=75/$max*$c['popbal2'];
      	$ballvit=75/$max*$c['bal'];
     
      	
      // echo $c['club']." ".round($c['bal'],2)." ".$c['kil']." ".$c['allkil'].'<br>';
      	
      
    ?>
    
   <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?=$mistse;?>. <?=$c['club'];?> <?=$c['kil'];?>з<?=$c['allkil'];?> <?=round($c['sumball'],2);?></div>
  <div class="progress-bar bg-success" role="progressbar" style="width: <?=$ballvit;?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><?=$namedey3;?> <?=round($c['bal'],2);?></div>
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$pop2vit;?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><?=$namedey2;?> <?=$c['popbal2'];?></div>
  <div class="progress-bar bg-info" role="progressbar" style="width: <?=$pop1vit;?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><?=$namedey1;?> <?=$c['popbal1'];?></div>
  

  
    </div>


    <?php
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
