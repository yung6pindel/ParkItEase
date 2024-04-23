<?php
    require_once "includes/dbh.inc.php";
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
    date_default_timezone_set('Europe/Sofia');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - Profile Page</title>
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
            <?php if ($role == 'Admin'){
                        echo '<li><a href="profiles.php">Профили</a></li>';
                    }
            ?>
            <li><a class="active" href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
            </ul>
    </nav>
    <form action="includes/operations/userupdate.inc.php" method="post">
      <div class="container-profile">
        <div class="profile-picture">
          <i class="fas fa-user"></i> 
        </div>
        <div class="profile-info">
          <h1>Вашият профил:</h1>
          <label for="username">Имена:</label>
          <input type="text" id="Names" name="Names" value="<?php echo $names?>" required>
          <label for="email">Емайл:</label>
          <input type="email" id="Email" name="Email" value="<?php echo $email?>" required>
          <button type="submit">Обнови</button>
        </div>
      </div>
    </form>
    <div class="reservation-container">
    <?php
      require_once "includes/reservation/show_reservations.inc.php";
      foreach ($results as $row) {
        ?>
        
      <div class="reservation-box">
        <form>
        <button id="circle-button">
        <div id="circle">
            <span id="cross">X</span>
        </div>
        </button>
        </form>
          <div class="reservation-info">
              <h2>Вашата резервация:</h2>
              <p><strong>Регистрационен номер на ППС: </strong><?php echo $row["PlateNumber"]; ?></p>
              <p><strong>Запазено паркомясто в: </strong><?php echo $row["Name"]?></p>
              <p><strong>Паркомясто номер: </strong><?php echo $row["Park_Number"]; ?></p>
              <p><strong>Резервиране на паркомясто за ден и час: </strong><?php echo date($row["ReservedFrom"]);?></p>
              <p><strong>Време на престой: </strong><?php echo $row["Duration"]; ?></p>
          </div>
      </div>
    <?php
      }
    ?>
    </div>
    <form action="includes/logout.inc.php" method="post" class="logout-form">
    <button type="submit" name="logoutButton" class="logout-button">Излез</button>
  </form>
</body>
</html>