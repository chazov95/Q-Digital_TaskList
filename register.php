<?php

$connector = new Connector();
$link = $connector->connect();

if (isset($_POST['submit'])) {

    $err = [];

    // проверям логин
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, сущестует ли уже пользователь с таким именем
    $query = mysqli_query($link, "SELECT id,password,hash FROM users WHERE login='" . $_POST['login'] . "'");
    $data = mysqli_fetch_assoc($query);

    if ($data['password'] === md5($_POST['password'])) {

        setcookie('hash', $data['hash']);

    } //в случаи, если пользователь с log/pass не существует, добавляем нового пользователя
    else {

        $login = $_POST['login'];

        $password = md5(trim($_POST['password']));

        $hash = md5(generateCode(10));

        $link->query("INSERT INTO users SET login='" . $login . "', password='" . $password . "',hash= '" . $hash . "'");
        $query = mysqli_query($link, "SELECT hash FROM users");
        $data = mysqli_fetch_assoc($query);

        setcookie('hash', $data['hash']);
    }
}
