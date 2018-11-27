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
      $query = "SELECT * FROM customers";
      $res = mysqli_query($link, $query);
    ?>
</table>
<?php
      if(isset($_POST['add'])){
        header("Location:customers_add.php");
      }
      else if (isset($_POST['delete'])){
      $query = "DELETE FROM customers WHERE id_customers = {$_POST['customer']}";
      $res = mysqli_query($link, $query);
      header("Location:customers.php");
      }
    ?>
    <form method="POST">
      <p align="center"><input type="submit" name="add" value="Добавить запись" /></p>
      <p align="center">
      <select name="customer">
        <option>Выберите клиента</option>
        <?php 
          while ($row = mysqli_fetch_array($res)){
        ?>
          <option value=<?php echo $row['id_customers']?>><?php echo $row['id_customers'].' - '.$row['FIO_customer']?></option>
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

