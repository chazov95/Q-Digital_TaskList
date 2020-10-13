<?php
try {
    require_once('Connector.php');
    $connector = new Connector();
    $link = $connector->connect();

    $userId = $link->query("SELECT id from users where hash='" . $_COOKIE['hash'] . "'")->fetch_assoc();
    $dataTask = $link->query("SELECT * from tasks where user_id='" . $userId['id'] . "'");

} catch (Throwable $exception) {
    echo $exception->getMessage();
}


