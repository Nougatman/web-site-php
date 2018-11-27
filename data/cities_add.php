<?php
  require_once 'connection.php'; // подключаем скрипт для дальнейшего взаимодействия с БД
  // подключаемся к серверу
  $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
?>


<html>
  <head>
    <title>Добавление записи</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2 align="center">Добавление записи в таблицу Города</h2>
    <form method="POST">
      <p style="color:aqua" align="center">Город <input type="text" name="city" value=""/></p>
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center"><input type="submit" name="cancel" value="Отмена" /></p>
    </form>
    <?php
      if (isset($_POST['add'])){
        $city = $_POST['city'];  
        if (!empty($city)){
        $query = "INSERT INTO `cities` (`name_city`) VALUES ('{$_POST['city']}')";
        $res = mysqli_query($link, $query);
        if ($res){
            echo "успешно добавлено";
            header("Location:cities.php");
        }
        else{
            echo '<p>Ошибка добавления: '.mysqli_error($link).'</p>';
        }
      }
      else echo "<p align='center' style='color:white'>Введены некорректные данные. Повторите ввод.</p>";
    }
    if (isset($_POST['cancel'])){
        header("Location:cities.php");
    }
    ?>
  </body>
</html>
