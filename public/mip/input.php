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

include_once("functions.php");
$link = ConnectToDB();

function setupIddBase() {
  return " cid INT NOT NULL, id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (cid, id),";
}

function setup($link) {  
 $sql = "CREATE TABLE IF NOT EXISTS meosOnlinePunch (".
   			setupIddBase().
   			" code SMALLINT UNSIGNED NOT NULL,".
   			" time INT UNSIGNED NOT NULL DEFAULT 0,".
   			" cardno INT UNSIGNED NOT NULL DEFAULT 0,".
   			" startno INT UNSIGNED NOT NULL DEFAULT 0,".
   			" modified TIMESTAMP NOT NULL".
   			") ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci";
 
  $link->query($sql);
}

setup($link);

// Extract headers
$lastid = 100000;
$cmpId = 0;
foreach ($_SERVER as $header => $value) {
  if (strcasecmp($header, "http_competition") == 0)
    $cmpId = (int)$value;
  if (strcasecmp($header, "http_lastid") == 0)
    $lastid = (int)$value;
}

$sql = "SELECT * FROM meosOnlinePunch WHERE cid = $cmpId AND id > $lastid";
$res = $link->query($sql);

$xmlout = array();
$maxid = $lastid;
while ($r = $res->fetch_assoc()) {
  if ($r['cardno'] > 0)
    $xmlout[] = '<p code="'.$r['code'].'" card="'.$r['cardno'].'" time="'.$r['time'].'"/>';
  else
    $xmlout[] = '<p code="'.$r['code'].'" sno="'.$r['startno'].'" time="'.$r['time'].'"/>';
    
  $lastid = max($lastid, $r['id']);
}

print '<?xml version="1.0"?>';
print '<MIPData lastid="'.$lastid.'">'."\n";
foreach($xmlout as $punch)
  print ' '.$punch."\n";

print '</MIPData>';

?>
