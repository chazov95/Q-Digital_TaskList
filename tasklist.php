<?php
require_once('./register.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task list</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Лист заданий</h1>
    <form action="/add.php" method="post">
        <input type="text" name="task" placeholder="Новая задача" >
        <button type="submit">Отправить</button>
    </form>
    <br>
    <?php
    $cookieTasks = unserialize($_COOKIE['TaskCookie']);
    foreach ($cookieTasks as $key => $cookieTask) {
        ?>
        <div class="<?= $cookieTask['Status'] ?>"> <?= $key + 1, '.' ?>      <?= $cookieTask['Body'] ?>
            <button onclick="document.location='del.php?taskId=<?= $key ?>'">Удалить</button>
            <button onclick="document.location='status.php?taskId=<?= $key ?>'">Выполнить</button>
        </div> <br>
        <?php
    }
    ?>
    <button onclick="document.location='deleteList.php'">Удалить все</button>
</body>
</html>