<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/information_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkItEase - Contact Page</title>
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
            <li><a class="active" href="contact.html">Контакт</a></li>
            <?php if ($role == 'Admin'){
                        echo '<li><a href="profiles.php">Профили</a></li>';
                    }
            ?>
            <li><a href="profile.php"><i class="fa fa-user" id="user-icon"></i></a></li>
        </ul>
    </nav>
    <section class="contact">
        <div class="c-container">
            <h2>Свържи се с нас</h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <h3>Изпрати ни съобщение</h3>
                    <form action="includes/contact/contact.inc.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="User_Id" value="<?php echo $_SESSION["user_Id"];?>">
                            <input type="text" name="Name" placeholder="Вашето име" value="<?php echo $names;?>" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="Email" placeholder="Вашият е-майл" value="<?php echo $email;?>" required>
                        </div>
                        <div class="form-group">
                            <textarea name="Message" placeholder="Въведете съобщението" required></textarea>
                        </div>
                        <button class="message" type="submit">Изпрати съобщението</button>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Информация за контакт:</h3>
                    <p><i class="fas fa-phone"></i>+35989 123 4567</p>
                    <p><i class="fas fa-envelope"></i>Hristo@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>бул. "Пещерско шосе" №26, Пловдив, България</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>