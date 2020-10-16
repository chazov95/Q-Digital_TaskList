<?php
session_start();
require_once('Connector.php');

$connector = new Connector();

$link = $connector->connect();

if ($_SESSION['id'] === $_GET['userId']) {

    $userId = intval($_GET['userId']);
    $query = $link->query("select * from tasks where user_id = '$userId'");
    while ($taskId = $query->fetch_assoc()) {
        if ($_GET['taskId'] === $taskId['id']) {
            $taskId = intval($_GET['taskId']);
            $link->query("UPDATE tasks  SET status = 'done' WHERE id = '$taskId'");
        }
    }
}
header('Location: /tasklist.php');
