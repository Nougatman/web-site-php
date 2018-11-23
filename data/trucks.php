<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Грузовики</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Доступная техника для осуществления грузоперевозок</h1>
    <?php
      $query = "SELECT * FROM trucks";
      $res = mysqli_query($link, $query);
      ?>
    <table align="center" bordercolor="aqua" border="1" width="90%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID</td>
      <td align="center">Автотранспорт</td>
      <td align="center">Госномер</td>
      <td align="center">Грузоподъёмность</td>
      <td align="center">ФИО водителя</td>
      <td align="center">Телефон</td>
      <td align="center">Длина грузового отсека</td>
      <td align="center">Высота</td>
      <td align="center">Ширина</td>
      <td align="center">Стоимость услуг(Х руб./час)</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_trucks'].'</td><td>'.$row['truck_model'].'</td><td>'.$row['statenumber'].
        '</td><td>'.$row['carrying'].'</td><td>'.$row['FIO_driver'].'</td><td>'.$row['phone'].'</td><td>'.$row['lenght'].
        '</td><td>'.$row['height'].'</td><td>'.$row['width'].'</td><td>'.$row['price'].'</td>';
      }
    ?>
</table>
    <a href="../tables_main.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Таблицы</font></h2></a>
    <a href="../main.php" align="center" title="Перейти на страницу">
        <h2><font color="aqua">Главная сайта</font></h2></a>
  </body>
</html>

