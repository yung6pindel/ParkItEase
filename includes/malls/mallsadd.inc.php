<?php
require_once 'dbh.inc.php';

$name = $_POST['Name'];
$description = $_POST['Description'];
$picture = "images/" . $_FILES['Picture']['name'];

$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["Picture"]["name"]);
move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file);

$sql = "INSERT INTO malls (Name, Description, Picture) VALUES (:name, :description, :picture)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':name' => $name, ':description' => $description, ':picture' => $picture]);

if ($stmt->rowCount()) {
  echo "New record created successfully";
  $file = fopen("../../" . $name . ".php", "w");
  $html = '
  <?php
    require_once "includes/dbh.inc.php";
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
    if(isset($_GET["mallId"])){
      $mallId = $_GET["mallId"];
    }
    if(isset($_GET["userId"])){
      $userId = $_GET["userId"];
    }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - Admin Main Page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="grid.css">
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
            <?php if ($role == "Admin"){
                echo `<li><a href="profiles.php">Профили</a></li>`;
                    }
                    ?>
            <li><a href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
        </ul>
    </nav>
    <form class="reservation_mall" action="includes/reservation/reservation.inc.php" method="post">
    <h2>Резервиране на място за паркиране</h2>
    <input type="hidden" name="mallId" value="<?php echo $mallId; ?>">
    <input type="hidden" name="userId" value="<?php echo $userId; ?>">
    <label for="regPlate">Регистрационен номер на МПС:</label>
    <input type="text" id="regPlate" name="regPlate"><br><br>
    <label for="regDateTime">Резервиране на място за ден и час:</label>
    <input type="datetime-local" id="regDateTime" name="regDateTime"><br><br>
    <label for="duration">Време на престой, в часове и/или минути:</label>
    <input type="time" id="duration" name="duration"><br><br>
    <button type="submit">Запази</button>
    </form>

</body>
  </html>
  ';
  fwrite($file, $html);
  fclose($file);
  header("Location: ../../index.php");  // Redirect to index page
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $pdo->errorInfo();
}