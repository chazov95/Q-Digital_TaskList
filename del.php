<?php
require_once('Controllers/taskController.php');

if ($_SESSION['id'] === $_GET['userId']) {
    $taskId = intval($_GET['taskId']);

    $link->query("DELETE FROM tasks WHERE id = '$taskId'");
}
header('Location: /tasklist.php');
