<?php
session_start();
require_once('Connector.php');
$connector = new Connector();
$link = $connector->connect();

if (!empty($_SESSION['id']) && !empty($_POST['description'])) {
    $userId = $_SESSION['id'];
    $description = htmlspecialchars($_POST['description']);
    $datetime = date_create()->format('Y-m-d H:i:s');
    $status = htmlspecialchars('new');

    $link->query("insert into tasks (user_id, description, created_at, status) values ('$userId','$description','$datetime ','$status')");
}
header('Location: /tasklist.php');
