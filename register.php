<?php
require_once('./Connector.php');

function generateCode()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clean = strlen($chars) - 1;

    while (strlen($code) < 10) {
        $code .= $chars[mt_rand(0, $clean)];
    }

    return $code;
}

$connector = new Connector();
$link = $connector->connect();

try {

    if (isset($_POST['submit'])) {

        $err = [];

        // проверям логин на допустимый синтаксис
        if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";

        }

        if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }

        // проверяем, сущестует ли уже пользователь с таким именем

        if (empty($err)) {
            session_start();
            $login = $_POST['login'];
            $query = mysqli_query($link, "SELECT id,password,hash FROM users WHERE login='" . $login . "'");
            $data = mysqli_fetch_assoc($query);


            if ($data['password'] === md5($_POST['password'])) {
                $_SESSION['hash'] = $data['hash'];
                $_SESSION['id'] = $data['id'];
            } else {
                //в случаи, если пользователь с комбинацией log/pass не существует, добавляем нового пользователя

                $password = md5(trim($_POST['password']));
                $hash = md5(generateCode());

                $link->query("INSERT INTO users SET login='" . $login . "', password='" . $password . "',hash= '" . $hash . "'");

                $_SESSION['id'] = $link->insert_id;
                $_SESSION['hash'] = $hash;
            }
            header('Location: /tasklist.php');

        } else {
            print "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach ($err as $error) {
                print $error . "<br>";
            }
        }
    }
} catch (Throwable $exception) {
    print_r($exception->getMessage());
}
