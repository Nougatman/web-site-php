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
    <a href="../traffics.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Заказы</font></h2></a>
    <a href="../cities.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Города</font></h2></a>
    <a href="../customers.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Клиенты</font></h2></a>
    <a href="../shipments.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Грузы</font></h2></a>
    <a href="../trucks.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Автотранспорт</font></h2></a>

        <a href="../main.php" align="center" title="Перейти на страницу">
        <h2><font color="#0088b2">Главная сайта</font></h2></a>
  </body>
</html>
