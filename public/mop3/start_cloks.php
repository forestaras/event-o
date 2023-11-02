
<?php
date_default_timezone_set('Europe/Kiev');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mop3";
$sid=8;
function start_time($start){
$timer=$start/10-10800;
$st=date('H:i:s', $timer);
return $st;
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT cid, id, name, st FROM mopcompetitor WHERE cid='$sid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	$row[ct]=start_time($row[st]);
  	$rows[]=$row;

   
  }
} else {
  echo "0 results";
}


foreach ($rows as $key) {
	echo $key['ct'].$key['name'].'<br>';

}
$timer=489000/10-10800;
echo date('H:i:s', $timer);

mysqli_close($conn);
?>
