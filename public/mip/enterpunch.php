<?php
  /*
  Copyright 2014-2018 Melin Software HB
  
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
  
      http://www.apache.org/licenses/LICENSE-2.0
  
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
  */

	include_once('functions.php');
	session_start();
  header('Content-type: text/html;charset=utf-8');
  
  $PHP_SELF = $_SERVER['PHP_SELF'];
	$link = ConnectToDB();

  if (isset($_POST['cmp']))
    $_SESSION['competition'] = 1 * (int)$_POST['cmp'];
  else if (!isset($_SESSION['competition']))
    $_SESSION['competition'] = 1;
  
  $cmpId = $_SESSION['competition'];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>MeOS Input Protocol</title>

<style type="text/css">
body {
  font-family: verdana, arial, sans-serif;
  font-size: 9pt;
  background-color: #FFFFFF;
}
</style>
</head>
<body>
<?php
$ctrl = '';
if (isset($_POST['submit'])) {
  $users = explode(" ", $_POST['user']);
  $time = $link->real_escape_string($_POST['time']);
  $ctrl = (int)$link->real_escape_string($_POST['ctrl']);
  if (strlen($time) < 2)
    $time = date("H:i:s");
  
  // Convert time HH:MM:SS to tenths of seconds after 00:00:00
  $t = 0;
  foreach(explode(":",$time) as $v)
    $t = $t*60 + $v;  
  $t *= 10;
  
  $sql = "INSERT INTO meosOnlinePunch SET cid=?, code=?, startno=?, time=?";
    
  $stmt = $link->prepare($sql);
  $stmt->bind_param("iiii", $cmpId, $ctrl, $user, $t);
  
  foreach($users as $user) {
    $t+=10;
    $stmt->execute();
    print "$user: $time<br>";
  }
}

?>

<form name="input" action="<?=$PHP_SELF;?>" method="post">
<table>
<tr>
<td>Competition id:</td><td><input type="number" name="cmp" size="5" value="<?=$cmpId;?>"></td><td>&nbsp;</td>
</tr>
<tr>
<td>Control number:</td><td><input type="number" name="ctrl" size="5" value="<?=$ctrl;?>" required></td><td>&nbsp;</td>
</tr>
<tr>
<td>Start number:</td><td><input type="text" name="user" size="6" required></td><td>You may provide several space separated start numbers.</td>
</tr>
<tr>
<td>Time:</td><td><input type="time" name="time" step="1" size="15"></td><td>(HH:MM:SS, Leave blank to user server time)</td>
</tr>
</table>
<input type="submit" name="submit" value="Submit">
</form> 

</body></html>
