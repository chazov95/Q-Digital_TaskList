<?php
require_once('Controllers/taskController.php');

if ($_SESSION['id'] === $_GET['userId']) {

    $link->query("DELETE FROM tasks WHERE id = '" . $_GET['taskId'] . "'");
}
header('Location: /tasklist.php');
