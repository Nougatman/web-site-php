<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Перевозки</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Таблица заказов на перевозки, включая выполненные заказы</h1>
    <?php
      $query = "SELECT * FROM shipments";
      $res = mysqli_query($link, $query);
      ?>
    <table align="center" bordercolor="aqua" border="1" width="35%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID</td>
      <td align="center">Груз</td>
      <td align="center">Вес (в тоннах)</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_shipments'].'</td><td>'.$row['shipment_info'].'</td><td>'.$row['weight'].'</td>';
      }
    ?>
</table>
    <a href="../tables_main.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Таблицы</font></h2></a>
    <a href="../main.php" align="center" title="Перейти на страницу">
        <h2><font color="aqua">Главная сайта</font></h2></a>
  </body>
</html>

