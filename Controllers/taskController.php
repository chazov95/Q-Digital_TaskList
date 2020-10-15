<?php
session_start();

try {
    require_once('Connector.php');
    $connector = new Connector();
    $link = $connector->connect();

    $userId = $_SESSION['id'];

    $dataTask = $link->query("SELECT * from tasks where user_id='$userId'");

} catch (Throwable $exception) {
    echo $exception->getMessage();
}
