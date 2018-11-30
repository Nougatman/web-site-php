<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Главная страница сайта</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Компания Fast Carrier</h1>
    <h2 align="center" style="color:aqua">Осуществляем междугородние грузоперевозки</h2> 
</table>
    <p align="center"><img src="../main.jpg" width="30%" border="2"/>
    <img src="../main2.jpg" width="30%" border="2"/>
    <img src="../main3.jpg" width="482pt" border="2"/></p>
    <p><a href="../tables_main.php" title="Перейти на страницу">
      <h2 align="center"><font color="white">Таблицы</font></h2></a></p>
    <p><a href="../requests.php" title="Перейти на страницу">
      <h2 align="center"><font color="white">Запросы</font></h2></a></p>
  </body>
</html>
