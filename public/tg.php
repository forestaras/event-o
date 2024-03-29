<?php
$ch = curl_init();

// Задаємо параметри запиту
curl_setopt($ch, CURLOPT_URL, "https://event-o.net/api/telegram/rez/139");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Виконуємо запит
$response = curl_exec($ch);

// Закриваємо curl-сесію
curl_close($ch);
?>