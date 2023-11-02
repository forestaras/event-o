<?php
function message_to_telegram($bot_token, $chat_id, $text, $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    curl_exec($ch);
}

// сохранить состояние бота для пользователя
function set_bot_state($chat_id, $data)
{
    file_put_contents(__DIR__ . '/users/' . $chat_id . '.txt', $data);
}

// получить текущее состояние бота для пользователя

function add_name_table($username, $name, $user_id)
{
    $conn = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO telegram (id, username, name, user_id)VALUES (' ','$username','$name','$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function all_name_table($name)
{
    $conn = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name FROM telegram";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
        }
    }

    $conn->close();
    return $row;
}


function get_bot_state($chat_id)
{
    if (file_exists(__DIR__ . '/users/' . $chat_id . '.txt')) {
        $data = file_get_contents(__DIR__ . '/users/' . $chat_id . '.txt');
        return $data;
    } else {
        return '';
    }
}
