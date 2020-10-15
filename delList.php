<?php
session_start();
require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();

$userId = $_SESSION['id'];

$link->query("DELETE FROM tasks WHERE user_id = '$userId'");

header('Location: /tasklist.php');
