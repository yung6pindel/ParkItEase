<?php
    require_once "../dbh.inc.php";
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Message = $_POST["Message"];
    $User_Id = $_POST["User_Id"];

    try {
    $query = "INSERT INTO contact_information (User_Id, Name, Email, Message) VALUES (:User_Id, :Name, :Email, :Message);";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":User_Id", $User_Id);
    $stmt -> bindParam(":Name", $Name);
    $stmt -> bindParam(":Email", $Email);
    $stmt -> bindParam(":Message", $Message);
    $stmt -> execute();
    
    $pdo = null;
    $stmt = null;

    header("Location: ../../contact.php");
    die();
    }   catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }