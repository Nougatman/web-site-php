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
    <h2 align="center">Добавление записи в таблицу Грузы</h2>
    <form method="POST">
      <p style="color:aqua" align="center">Информация о грузе <input type="text" name="shipment_info" value=""/></p>
      <p style="color:aqua" align="center">Вес груза (в тоннах)<input type="text" name="weight" value=""/></p>
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center"><input type="submit" name="cancel" value="Отмена" /></p>
    </form>
    <?php
      if (isset($_POST['add'])){
        $shipment_info = $_POST['shipment_info'];
        $weight = $_POST['weight'];
        if ((!empty($shipment_info))&&(!empty($weight))){
        $query = "INSERT INTO `shipments` (`shipment_info`, `weight`) VALUES ('{$_POST['shipment_info']}', '{$_POST['weight']}')";
        $res = mysqli_query($link, $query);
        if ($res){
            echo "успешно добавлено";
            header("Location:shipments.php");
        }
        else{
            echo '<p>Ошибка добавления: '.mysqli_error($link).'</p>';
        }
      }
      else echo "<p align='center' style='color:white'>Введены некорректные данные. Повторите ввод.</p>";
    }
    if (isset($_POST['cancel'])){
        header("Location:shipments.php");
    }
    ?>
  </body>
</html>
