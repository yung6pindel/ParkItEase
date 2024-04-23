<?php
    $Names = $_POST["Names"];
    $Email = $_POST["Email"];

    try {
        session_start();
        require_once "../dbh.inc.php";
        $query = "UPDATE users SET Names = :Names, Email = :Email WHERE Id = :Id;";
        $stmt = $pdo->prepare($query);  
        $stmt->bindParam(':Names', $Names);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Id', $_SESSION["user_Id"]);
        $stmt->execute();
        
        $pdo = null;
        $stmt = null;

        header("Location: ../../profile.php");
        die();
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }