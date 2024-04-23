<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - Main Page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><i class="fa fa-bars"></i></label> 
        <label class="logo">ParkItEase</label>
        <ul>
            <li><a class="active" href="index.php">Начало</a></li>
            <li><a href="about.php">За нас</a></li>
            <li><a href="contact.php">Контакт</a></li>
            <?php
                    if ($role == 'Admin'){
                        echo '<li><a href="profiles.php">Профили</a></li>';
                    }
            ?>
            <li><a href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
        </ul>
    </nav>
    <div id="overlay" class="overlay"></div>
    <div class="grid">
      <?php
          require_once "includes/malls/malls.inc.php";
          foreach ($results as $row) {
              $id = $row["Id"];
              echo "<div class='grid-item' onclick='parent.location = `";
              if($row["Name"] == "Мол Марково Тепе"){
                echo "mallmarkovo.php?mallId=".$id."&userId=".$Id."`'>";
              } else if($row["Name"] == "Мол Пловдив"){
                echo "mallplovdiv.php?mallId=".$id."&userId=".$Id."`'>";
              } else if($row["Name"] == "Мол Пловдив Плаза"){
                echo "mallplaza.php?mallId=".$id."&userId=".$Id."`'>";
              } else {
                echo htmlspecialchars($row["Name"]) . ".php?mallId=".$id."&userId=".$Id."`'>";
              }
              echo "<img src='" . htmlspecialchars($row["Picture"]) . "' alt='" . htmlspecialchars($row["Name"]) . "'>";
              echo "<div class='text'>
                      <h3>" . htmlspecialchars($row["Name"]) . "</h3>
                      <p>". htmlspecialchars($row["Description"]) . "</p>
                    </div>
                    </div>";
            }
          ?>
    </div>
    <?php
    if ($role == 'Admin'){
        echo '<button id="openFormButton" class="open-form-button">+</button>';
    }
    ?>
    <div id="formPopup" class="form-popup">
      <form action="includes/malls/mallsadd.inc.php" class="form-container" method="post" enctype="multipart/form-data">
        <h1>Добавяне на нов платен паркинг</h1>
        <label for="name"><b>Име</b></label>
        <input type="text" placeholder="Въведи име" name="Name" required>
        <label for="description"><b>Описание</b></label>
        <input type="text" placeholder="Добави описание" name="Description" required>
        <label for="picture"><b>Снимка</b></label>
        <input type="file" name="Picture" required>
        <button type="submit" class="btn">Добави</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Затвори</button>
      </form>
    </div>
    <script src="javascript/index.js"></script>
</body>
</html>