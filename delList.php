<?php

require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();

$link->query("DELETE FROM tasks WHERE user_id = '".$_GET['userId']."'");
header('Location: /tasklist.php');