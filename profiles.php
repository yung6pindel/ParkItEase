<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
    if($role != 'Admin'){
        header("Location: index.php");
        die();
    }	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - Profiles Page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fa fa-bars"></i></label> 
        <label class="logo">ParkItEase</label>
        <ul>
            <li><a href="index.php">Начало</a></li>
            <li><a href="about.php">За нас</a></li>
            <li><a href="contact.php">Контакт</a></li>
            <li><a class="active" href="profiles.php">Профили</a></li>
            <li><a href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
        </ul>
    </nav>
    <h2>Данни за всички профили</h2>
      <table>
        <thead>
          <tr>
            <th>Имена</th>
            <th>Емайл</th>
            <th>Роля</th>
            <th>Действие</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once "includes/operations/users.inc.php";
            foreach ($results as $row) {
              $id=$row["Id"];
              echo "<tr>";
              echo "<td>" . $row["Names"] . "</td>";
              echo "<td>". $row["Email"] . "</td>";
              if($row["Role"] == 'Admin'){
                echo "<td>Админ</td>";
              } else {
                echo "<td>Потребител</td>";
              }
              echo "<td>
                    <a class='button' href='updateuser.php?updateid=".$id."' id='update'>Поднови</a>
                    <a href='includes/operations/userdelete.inc.php?deleteid=".$id."' class='button' id='delete'>Изтрий</a>
                    </td>";
              echo "</tr>";
              
            }
          ?>
        </tbody>
      </table>
</body>
</html>