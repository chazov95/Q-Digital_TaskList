<?php
try{
require_once ('./Controllers/taskController.php');
}catch (Throwable $exception){
    echo $exception->getMessage();
}
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
        <input name="userId" type="hidden" value="<?= $userId['id']?>" >
        <input type="text" name="description" placeholder="Новая задача" >
        <button type="submit">Отправить</button>
    </form>
    <br>
    <?php
    while ($task = $dataTask->fetch_assoc()) {

    ?>
    <div class="<?= $task['status']?>"> <?= $task['description'];?>
    <button onclick="document.location='del.php?taskId=<?= $task['id'] ?>'">Удалить</button>
    <button onclick="document.location='status.php?taskId=<?= $task['id'] ?>'">Выполнить</button>
    </div> <br>
    <?php
    }
    ?>
    <button onclick="document.location='delList.php?userId=<?= $userId['id']?>'">Удалить все</button>
</body>
</html>