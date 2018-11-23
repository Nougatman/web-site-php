<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Клиенты</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Данные клиентов, воспользовавшихся услугами компании</h1>
    <?php
      $query = "SELECT * FROM customers";
      $res = mysqli_query($link, $query);
      ?>
    <table align="center" bordercolor="aqua" border="1" width="25%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID</td>
      <td align="center">ФИО клтента</td>
      <td aligh="center">Номер телефона</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_customers'].'</td><td>'.$row['FIO_customer'].'</td><td>'.$row['phone'].'</td>';
      }
    ?>
</table>
    <a href="../tables_main.php" align="center" title="Перейти на страницу">
        <h2><font color="white">Таблицы</font></h2></a>
    <a href="../main.php" align="center" title="Перейти на страницу">
        <h2><font color="aqua">Главная сайта</font></h2></a>
  </body>
</html>

