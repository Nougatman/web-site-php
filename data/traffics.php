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
      $query = "SELECT * FROM (((traffics INNER JOIN customers ON traffics.customers = customers.id_customers)
        INNER JOIN shipments ON traffics.shipment = shipments.id_shipments)
        INNER JOIN trucks ON traffics.truck = trucks.id_trucks)
        INNER JOIN cities ON traffics.city = cities.id_cities";
      $res = mysqli_query($link, $query);
      ?>
    <table align="center" bordercolor="aqua" border="1" width="75%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID перевозки</td>
      <td align="center">Клиент</td>
      <td align="center">Груз</td>
      <td align="center">Водитель</td>
      <td align="center">Грузовик (грз)</td>
      <td align="center">Город доставки</td>
      <td align="center">Улица</td>
      <td align="center">Дата доставки</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_traffics'].'</td><td>'.$row['FIO_customer'].'</td><td>'.$row['shipment_info'].
        '</td><td>'.$row['FIO_driver'].'</td><td>'.$row['statenumber'].'</td><td>'.$row['name_city'].'</td><td>'.$row['street'].
          '</td><td>'.$row['delivery_date'].'</td>';
      }
      $query = "SELECT * FROM traffics INNER JOIN customers ON traffics.customers = customers.id_customers";
      $res = mysqli_query($link, $query);
    ?>
    </table>
    <?php
      if(isset($_POST['add'])){
        header("Location:traffics_add.php");
      }
      else if (isset($_POST['delete'])){
      $query = "DELETE FROM traffics WHERE id_traffics = {$_POST['traffic']}";
      $res = mysqli_query($link, $query);
      header("Location:traffics.php");
      }
    ?>
    <form method="POST">
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center">
      <select name="traffic">
        <option>Выберите заказ</option>
        <?php 
          while ($row = mysqli_fetch_array($res)){
        ?>
          <option value=<?php echo $row['id_traffics']?>><?php echo $row['id_traffics'].' - '.$row['FIO_customer']?></option>
        <?php
          }
        ?>
      </select></p>
    <p align="center"><input type="submit" name="delete" value="Удалить запись" /></p>
    </form>
    <p><a href="../tables_main.php" title="Перейти на страницу">
        <h2 align="center"><font color="white">Таблицы</font></h2></a></p>
    <p><a href="../main.php" title="Перейти на страницу">
        <h2 align="center"><font color="aqua">Главная сайта</font></h2></a></p>
  </body>
</html>

