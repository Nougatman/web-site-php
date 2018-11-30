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

    <?php
        $query1 = "SELECT * FROM customers";
        $res1 = mysqli_query($link, $query1);
        $query2 = "SELECT * FROM shipments";
        $res2 = mysqli_query($link, $query2);
        $query3 = "SELECT * FROM trucks";
        $res3 = mysqli_query($link, $query3);
        $query4 = "SELECT * FROM cities";
        $res4 = mysqli_query($link, $query4);
      ?>

    <form method="POST">
      <p style="color:aqua" align="center">ФИО заказчика 
      <select name="FIO">
        <option>Выберите заказчика</option>
        <?php
          while ($row1 = mysqli_fetch_array($res1)){
        ?>
          <option value=<?php echo $row1['id_customers']?>><?php echo $row1['id_customers'].' - '.$row1['FIO_customer']?></option>
        <?php
          }
        ?>
      </select></p>

      <p style="color:aqua" align="center">Груз (краткая инфнормация)
      <select name="shipment">
        <option>Выберите заказчика</option>
        <?php
          while ($row2 = mysqli_fetch_array($res2)){
        ?>
          <option value=<?php echo $row2['id_shipments']?>><?php echo $row2['id_shipments'].' - '.$row2['shipment_info']?></option>
        <?php
          }
        ?>
      </select></p>

      <p style="color:aqua" align="center">Грузовик (ГРЗ)
      <select name="truck">
        <option>Выберите грузовик</option>
        <?php
          while ($row3 = mysqli_fetch_array($res3)){
        ?>
          <option value=<?php echo $row3['id_trucks']?>><?php echo $row3['id_trucks'].' - '.$row3['truck_model']?></option>
        <?php
          }
        ?>
      </select></p>

      <p style="color:aqua" align="center">Город доставки
      <select name="city">
        <option>Выберите город доставки</option>
        <?php
          while ($row4 = mysqli_fetch_array($res4)){
        ?>
          <option value=<?php echo $row4['id_cities']?>><?php echo $row4['id_cities'].' - '.$row4['name_city']?></option>
        <?php
          }
        ?>
      </select></p>

    <?php
    if (isset($_POST['add'])){
        $FIO = $_POST['FIO'];
        $shipment = $_POST['shipment'];
        $truck = $_POST['truck'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $delivey_date = $_POST['delivery_date'];
        if ((!empty($FIO))&&(!empty($shipment))&&(!empty($truck))&&(!empty($city))&&(!empty($street))&&(!empty($delivey_date))){
            $query = "INSERT INTO `traffics` (`customers`, `shipment`, `truck`, `city`, `street`, `delivery_date`) 
                VALUES ('{$_POST['FIO']}', '{$_POST['shipment']}', '{$_POST['truck']}', '{$_POST['city']}', '{$_POST['street']}', 
                    '{$_POST['delivery_date']}')";
            $res = mysqli_query($link, $query);
            if ($res){
                echo "успешно добавлено";
                header("Location:traffics.php");
            }
            else{
                echo '<p>Ошибка добавления: '.mysqli_error($link).'</p>';
            }
        }
        else echo "<p align='center' style='color:white'>Введены некорректные данные. Повторите ввод.</p>";
    }
    if (isset($_POST['cancel'])){
        header("Location:traffics.php");
    }
    ?>

      <p style="color:aqua" align="center">Улица <input type="text" name="street" value=""/></p>
      <p style="color:aqua" align="center">Дата доставки (ДД:ММ:ГГ) <input type="text" name="delivery_date" value=""/></p>
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center"><input type="submit" name="cancel" value="Отмена" /></p>
    </form>
  </body>
</html>
