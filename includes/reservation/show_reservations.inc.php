<?php
    try {
        require_once "includes/dbh.inc.php";
        $query = "SELECT reserved.userId, reserved.Mall_Id, reserved.PlateNumber, reserved.ReservedFrom, reserved.Duration, reserved.Park_Number, malls.Name FROM reserved
        INNER JOIN malls ON reserved.Mall_Id = malls.Id INNER JOIN users ON reserved.userId = users.Id WHERE userId = :userId;";

        $stmt = $pdo->prepare($query);  
        $stmt -> bindParam(":userId", $_SESSION["user_Id"]);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;
        
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }