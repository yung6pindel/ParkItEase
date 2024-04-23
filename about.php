<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - About Page</title>
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
            <li><a class="active" href="about.php">За нас</a></li>
            <li><a href="contact.php">Контакт</a></li>
            <?php if ($role == 'Admin'){
                        echo '<li><a href="profiles.php">Профили</a></li>';
                    }
            ?>
            <li><a href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
        </ul>
    </nav>
    <div class="heading">
        <h1>За нас</h1>
        <h2>Добре дошли в ParkItEase!</h2>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="images/aboutus.avif" alt="Photo of a open parking">
            </div>
            <div class="about-content">
                <h2>Правим паркирането лесно</h2>
                <p>ParkItEase е иновативно приложение, което ви помага да резервирате парко място в платен паркинг с лекота. Ние сме тук, за да направим паркирането по-удобно и без стрес за всеки.</p><br>
                <p>Нашата мисия е да ви осигурим лесен начин за намиране и резервиране на паркинг места по всяко време и навсякъде. С ParkItEase, можете да се наслаждавате на по-спокойно паркиране и да избегнете загубата на време в търсене на свободно място.</p>
            </div>
        </section>
    </div>
</body>
</html>