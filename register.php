<?php

$link = mysqli_connect("mysql", "db", "db", "db");

if (isset($_POST['submit'])) {

    $err = [];

    // проверям логин
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE login='" . $_POST['login'] . "'");
    $queryResult = $query->fetch_all();

    if (count($queryResult) > 0) {
        setcookie('user_id', (string)$queryResult[0][0]);
        header("Location: tasklist.php");
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {

        $login = $_POST['login'];

        $password = md5(($_POST['password']));

        $link->query("INSERT INTO users SET login='" . $login . "', password='" . $password . "'");
        $userId = mysqli_insert_id($link);
        setcookie('user_id', (string)$userId);
        header("Location: tasklist.php");
        exit();
    } else {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach ($err as $error) {
            print $error . "<br>";
        }
    }
}
