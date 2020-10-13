<?php

require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();
$datetime = date_create()->format('Y-m-d H:i:s');

$link->query("insert into tasks (user_id, description, created_at, status) values (".$_POST['userId'].",'".$_POST['description']."','".$datetime."','new')");
 header('Location: /tasklist.php');
