<?php
session_start();
require_once('Controllers/taskController.php');

if (!empty($_SESSION)) {
    $taskId = intval($_GET['taskId']);
    $userId = $_SESSION['id'];
    $query = $link->query("select id from tasks where user_id = '$userId' and id = '$taskId'");

    $link->query("delete from tasks where id = '$taskId'");
}
header('Location: /tasklist.php');
