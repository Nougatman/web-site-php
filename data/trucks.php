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
    <table align="center" bordercolor="aqua" border="1" width="100%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID</td>
      <td align="center">Автотранспорт</td>
      <td align="center">Госномер</td>
      <td align="center">Грузоподъёмность (т.)</td>
      <td align="center">ФИО водителя</td>
      <td align="center">Телефон</td>
      <td align="center">Длина грузового отсека (м.)</td>
      <td align="center">Высота (м.)</td>
      <td align="center">Ширина (м.)</td>
      <td align="center">Грузчики</td>
      <td align="center">Стоимость услуг(Х руб./час)</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_trucks'].'</td><td>'.$row['truck_model'].'</td><td>'.$row['statenumber'].
        '</td><td>'.$row['carrying'].'</td><td>'.$row['FIO_driver'].'</td><td>'.$row['phone'].'</td><td>'.$row['lenght'].
        '</td><td>'.$row['height'].'</td><td>'.$row['width'].'</td><td>'.$row['loader'].'</td><td>'.$row['price'].'</td>';
      }
      $query = "SELECT * FROM trucks";
      $res = mysqli_query($link, $query);
    ?>
    </table>
    <?php
      if(isset($_POST['add'])){
        header("Location:trucks_add.php");
      }
      else if (isset($_POST['delete'])){
      $query = "DELETE FROM trucks WHERE id_trucks = {$_POST['truck']}";
      $res = mysqli_query($link, $query);
      header("Location:trucks.php");
      }
    ?>
    <form method="POST">
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center">
      <select name="truck">
        <option>Выберите транспорт (грузовик)</option>
        <?php 
          while ($row = mysqli_fetch_array($res)){
        ?>
          <option value=<?php echo $row['id_trucks']?>><?php echo $row['id_trucks'].' - '.$row['truck_model']?></option>
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

