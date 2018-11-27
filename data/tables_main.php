<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Раздел Таблицы</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Раздел таблицы</h1>
    <p><a href="../traffics.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Заказы</font></h2></a></p>
    <p><a href="../cities.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Города</font></h2></a></p>
    <p><a href="../customers.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Клиенты</font></h2></a></p>
    <p><a href="../shipments.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Грузы</font></h2></a></p>
    <p><a href="../trucks.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Автотранспорт</font></h2></a></p>

    <p><a href="../main.php" title="Перейти на страницу">
        <h2 align="center"><font color="#0088b2">Главная сайта</font></h2></a></p>
  </body>
</html>
