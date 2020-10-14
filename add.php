<?php

require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();
$datetime = date_create()->format('Y-m-d H:i:s');
$description=htmlspecialchars($_POST['description']);
$link->query("insert into tasks (user_id, description, created_at, status) values (".$_POST['userId'].",'".$description."','".$datetime."','new')");
 header('Location: /tasklist.php');
