<?php
define("MYSQL_HOSTNAME", "localhost");
define("MYSQL_USERNAME", "u320095004_forestaras");
define("MYSQL_DBNAME", "u320095004_evento");  
define("MYSQL_PASSWORD", "Nfhnfr-30");
$site_dir = dirname(dirname(__FILE__)).'/'; // корень сайта
$bot_token = '2107045715:AAFH4DLnTFuxLCTxZ17FGLj0hHCbNbAbOm8'; // токен вашего бота
$data = file_get_contents('php://input'); // весь ввод перенаправляем в $data
$data = json_decode($data, true); // декодируем json-закодированные-текстовые данные в PHP-массив
$conn = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
?>