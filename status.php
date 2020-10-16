<?php
session_start();
require_once('Connector.php');

$connector = new Connector();

$link = $connector->connect();

if (!empty($_SESSION)) {

    $userId = $_SESSION['id'];
    $taskId = intval($_GET['taskId']);
    $query = $link->query("select id from tasks where user_id = '$userId' and id = '$taskId'");

    $link->query("UPDATE tasks  SET status = 'done' WHERE id = '$taskId'");
}
header('Location: /tasklist.php');
