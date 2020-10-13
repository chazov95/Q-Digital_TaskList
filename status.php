<?php

require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();

$link->query("UPDATE tasks  SET status = 'done' WHERE id = '".$_GET['taskId']."'");
header('Location: /tasklist.php');
