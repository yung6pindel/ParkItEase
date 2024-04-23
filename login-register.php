<?php
    require 'includes/config_session.inc.php';
    require 'includes/signup/signup_view.inc.php';
    require 'includes/login/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Регистриране</header>
            <form action="includes/signup/signup.inc.php" method="post">
                <?php
                    signup_input();
                ?>
                
                <input type="submit" value="Регистриране"/>
            </form> 
                <?php
                    check_signup_errors();
                ?>
        </div>
        <div class="form login">
            <header>Влизане</header>
            <form action="includes/login/login.inc.php" method="post">
                <input type="email" name="Email" placeholder="Е-майл адрес" />
                <input type="password" name="Password" placeholder="Парола" />
                <input type="submit" value="Влизане"/>
            </form> 
            <?php
                check_login_errors();
                ?>
        </div>
        
        <script src="javascript/login-register.js"></script>
    </section>
</body>
</html>