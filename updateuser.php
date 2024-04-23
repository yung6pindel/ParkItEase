<?php
require_once "includes/config_session.inc.php";
require_once "includes/information_session.inc.php";
if(isset($_GET['updateid'])) {
    $updateId = $_GET['updateid'];
    $query = "SELECT * FROM users WHERE Id = :updateId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':updateId', $updateId);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: ./profiles.php");
    die();
}
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
    <title>ParkItEase - Update User</title>
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
    <h2 class="update_user">Актуализация на потребителската информация</h2>
    <form class="user_update" action="includes/operations/update.inc.php" method="post">
        <input type="hidden" name="updateid" value="<?php echo $updateId; ?>">
        <label for="Names">Имена:</label>
        <input type="text" id="Names" name="Names" value="<?php echo $user['Names']; ?>" required>
        <label for="Email">Емайл:</label>
        <input type="email" id="Email" name="Email" value="<?php echo $user['Email']; ?>" required>
        <label for="Role">Роля:</label>
        <select id="Role" name="Role">
            <option value="Admin" <?php if($user['Role'] == 'Admin') echo 'selected'; ?>>Админ</option>
            <option value="User" <?php if($user['Role'] == 'User') echo 'selected'; ?>>Потребител</option>
        </select><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>