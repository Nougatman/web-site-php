<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Раздел запросов</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Раздел запросов к БД</h1>

    <p><a href="../main.php" title="Перейти на страницу">
        <h2 align="center"><font color="#0088b2">Главная сайта</font></h2></a></p>
  </body>
</html>
