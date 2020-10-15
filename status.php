<?php
session_start();
require_once('Connector.php');

$connector = new Connector();

$link = $connector->connect();

if ($_SESSION['id'] === $_GET['userId']) {
    $taskId = intval($_GET['taskId']);

    $link->query("UPDATE tasks  SET status = 'done' WHERE id = '$taskId'");
}
header('Location: /tasklist.php');
