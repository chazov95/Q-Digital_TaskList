<?php

require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();

$link->query("DELETE FROM tasks WHERE id = '".$_GET['taskId']."'");
header('Location: /tasklist.php');
