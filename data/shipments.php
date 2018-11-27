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
      $query = "SELECT * FROM shipments";
      $res = mysqli_query($link, $query);
    ?>
    </table>
    <?php
      if(isset($_POST['add'])){
        header("Location:shipments_add.php");
      }
      else if (isset($_POST['delete'])){
      $query = "DELETE FROM shipments WHERE id_shipments = {$_POST['shipment']}";
      $res = mysqli_query($link, $query);
      header("Location:shipments.php");
      }
    ?>
    <form method="POST">
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center">
      <select name="shipment">
        <option>Выберите груз</option>
        <?php 
          while ($row = mysqli_fetch_array($res)){
        ?>
          <option value=<?php echo $row['id_shipments']?>><?php echo $row['id_shipments'].' - '.$row['shipment_info']?></option>
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

