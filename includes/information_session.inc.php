<?php

require_once 'dbh.inc.php';
if(isset($_SESSION["user_Id"])){
    $result = get_user($pdo);
} else if(isset($_SESSION["username_user"])) {
    $result = get_user_name($pdo);
}
if(!$result){
    header("Location: ./login-register.php");
}
if($result["Role"] == "Admin"){
    $role = "Admin";
} else {
    $role = "User";
}

$Id = $result["Id"];
$names = $result["Names"];
$email = $result["Email"];
$password = $result["Password"];
$_SESSION["user_Id"] = $Id;
function get_user_name(object $pdo){
    $query = "SELECT * FROM users WHERE Names = :Names";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":Names", $_SESSION["username_user"]);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_user(object $pdo) {
    $query = "SELECT * FROM users WHERE Id = :Id";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":Id", $_SESSION["user_Id"]);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
