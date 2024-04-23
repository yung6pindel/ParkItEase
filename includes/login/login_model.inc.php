<?php

    declare(strict_types=1);

    function get_user(object $pdo, string $Email) {
        $query = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(":Email", $Email);
        $stmt -> execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
