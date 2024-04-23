<?php
if(isset($_POST["updateid"])) {
    include_once "../dbh.inc.php";
    $id = $_POST["updateid"];
    $names = $_POST["Names"];
    $email = $_POST["Email"];
    $role = $_POST["Role"];

    $sql = "UPDATE users set Names = :Names, Email = :Email, Role = :Role WHERE Id = $id";
    $stmt = $pdo->prepare($sql);  

    $stmt->bindParam(':Names', $names);
    $stmt->bindParam(':Email', $email);
    $stmt->bindParam(':Role', $role);
    
    $result = $stmt->execute();
    $pdo = null;
    $stmt = null;
    if($result) {
        header("Location: ../../profiles.php?update=success");
    } else {
        header("Location: ../../profiles.php?update=error");
    }
} else {
    header("Location: ../../profiles.php");
    exit();
}