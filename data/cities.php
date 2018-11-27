<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Города</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 align="center">Города, в которые осуществляется доставка</h1>
    <?php
      $query = "SELECT * FROM cities";
      $res = mysqli_query($link, $query);
    ?>
    <table align="center" bordercolor="aqua" border="1" width="25%" bgcolor="#040a14" style="color:azure">
    <tr>
      <td align="center">ID</td>
      <td align="center">Город</td>
    </tr>
    <?php
      while ($row = mysqli_fetch_array($res)){
        echo '<tr><td>'.$row['id_cities'].'</td><td>'.$row['name_city'].'</td>';
      }
      $query = "SELECT * FROM cities";
      $res = mysqli_query($link, $query);
    ?>
    </table>
    <?php
      if(isset($_POST['add'])){
        header("Location:cities_add.php");
      }
      else if (isset($_POST['delete'])){
      $query = "DELETE FROM cities WHERE id_cities = {$_POST['city']}";
      $res = mysqli_query($link, $query);
      header("Location:cities.php");
      }
    ?>
    <form method="POST">
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center">
      <select name="city">
        <option>Выберите город</option>
        <?php 
          while ($row = mysqli_fetch_array($res)){
        ?>
          <option value=<?php echo $row['id_cities']?>><?php echo $row['id_cities'].' - '.$row['name_city']?></option>
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