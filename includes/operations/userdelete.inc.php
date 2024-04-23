<?php   
include_once "../dbh.inc.php";
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM users WHERE Id = $id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
    if($result) {
        header("Location: ../../profiles.php?delete=success");
        exit();
    } else {
        header("Location: ../../profiles.php?delete=error");
        exit();
    }
} else {
    header("Location: ../../profiles.php");
    exit();
}