<?php
session_start();
require_once('Controllers/taskController.php');

if ($_SESSION['id'] === $_GET['userId']) {

    $userId = intval($_GET['userId']);
    $query = $link->query("select * from tasks where user_id = '$userId'");

    while ($taskId = $query->fetch_assoc()) {
        if ($_GET['taskId'] === $taskId['id']) {
            $taskId = intval($_GET['taskId']);

            $link->query("delete from tasks where id = '$taskId'");
        };
    }
}
header('Location: /tasklist.php');
