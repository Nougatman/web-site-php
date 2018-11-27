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

    <a href="../main.php" align="center" title="Перейти на страницу">
        <h2><font color="#0088b2">Главная сайта</font></h2></a>
  </body>
</html>
