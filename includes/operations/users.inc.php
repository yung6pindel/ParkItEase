<?php
      try {
          require_once "includes/dbh.inc.php";
          $query = "SELECT * FROM users;";
          $stmt = $pdo->prepare($query);  
          $stmt->execute();
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
          $pdo = null;
          $stmt = null;
      } catch (PDOException $e){
          die("Query failed: " . $e->getMessage());
      }

      