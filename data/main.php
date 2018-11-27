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
    <h2 align="center" style="color:aqua">Осуществляем грузоперевозки между следующими городами:</h2> 
      <p align="center" style="color:white">Уфа, Ижевск, Казань, Ишимбай, Стерлитамак,
      Нефтекамск, Нижнекамск, Санкт-Петербург, Москва, Псков, Ульяновск, Альметьевск, Тольятти,
      Нижний Новгород, Самара, Оренбург, Екатеринбург, Киров, Сызрань, Ростов, Саратов,
      Ростов-на-Дону, Мурманск, Братск, Тверь, Тамбов, Барнаул, Владивосток, Красноярск</p>
</table>
    <img src="../main.jpg" width="30%" border="2"/>
    <img src="../main2.jpg" width="30%" border="2"/>
    <img src="../main3.jpg" width="482pt" border="2"/>
    <a href="../tables_main.php" align="center" title="Перейти на страницу">
      <h2><font color="white">Таблицы</font></h2></a>
    <a href="../requests.php" align="center" title="Перейти на страницу">
      <h2><font color="white">Запросы</font></h2></a>
  </body>
</html>
