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
    <h2 align="center">Добавление записи в таблицу Автотранспорт (грузовики)</h2>
    <form method="POST">
      <p style="color:aqua" align="center">Транспорт (грузовик) <input type="text" name="truck" value=""/></p>
      <p style="color:aqua" align="center">ГРЗ <input type="text" name="statenumber" value=""/></p>
      <p style="color:aqua" align="center">Грузоподъемность (в тоннах)<input type="text" name="carrying" value=""/></p>
      <p style="color:aqua" align="center">ФИО водителя <input type="text" name="FIO_driver" value=""/></p>
      <p style="color:aqua" align="center">Номер телефона <input type="text" name="phone" value=""/></p>
      <p style="color:aqua" align="center">Длина кузова <input type="text" name="lenght" value=""/></p>
      <p style="color:aqua" align="center">Высота кузова <input type="text" name="height" value=""/></p>
      <p style="color:aqua" align="center">Ширина кузова <input type="text" name="width" value=""/></p>
      <p style="color:aqua" align="center">Грузчики (есть/нет) <input type="text" name="loader" value=""/></p>
      <p style="color:aqua" align="center">Стоимость услуг (Х руб./час) <input type="text" name="price" value=""/></p>
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center"><input type="submit" name="cancel" value="Отмена" /></p>
    </form>
    <?php
      if (isset($_POST['add'])){
        $truck = $_POST['truck'];
        $statenumber = $_POST['statenumber'];
        $carrying = $_POST['carrying'];
        $FIO_driver = $_POST['FIO_driver'];
        $phone = $_POST['phone'];
        $lenght = $_POST['lenght'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $loader = $_POST['loader'];
        $price = $_POST['price'];
        if ((!empty($truck))&&(!empty($statenumber))&&(!empty($carrying))&&(!empty($FIO_driver))&&(!empty($phone))&&(!empty($lenght))
            &&(!empty($height))&&(!empty($width))&&(!empty($loader))&&(!empty($price))){
        $query = "INSERT INTO `trucks` (`truck_model`, `statenumber`, `carrying`, `FIO_driver`, `phone`, `lenght`, `height`, `width`, `loader`, `price`)
             VALUES ('{$_POST['truck']}', '{$_POST['statenumber']}', '{$_POST['carrying']}', '{$_POST['FIO_driver']}', '{$_POST['phone']}',
                '{$_POST['lenght']}', '{$_POST['height']}', '{$_POST['width']}', '{$_POST['loader']}', '{$_POST['price']}')";
        $res = mysqli_query($link, $query);
        if ($res){
            echo "успешно добавлено";
            header("Location:trucks.php");
        }
        else{
            echo '<p>Ошибка добавления: '.mysqli_error($link).'</p>';
        }
      }
      else echo "<p align='center' style='color:white'>Введены некорректные данные. Повторите ввод.</p>";
    }
    if (isset($_POST['cancel'])){
        header("Location:trucks.php");
    }
    ?>
  </body>
</html>
