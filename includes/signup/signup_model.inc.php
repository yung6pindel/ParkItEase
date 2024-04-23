<?php
declare(strict_types=1);

function get_email(object $pdo, string $Email) {
    $query = "SELECT Email FROM users WHERE Email = :Email";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":Email", $Email);
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $Names, string $Password ,string $Email) {
    $query = "INSERT INTO users (Names, Email, Password, Role) VALUES (:Names, :Email, :Password, 'User');";
    $stmt = $pdo->prepare($query);
    /* hash Password */
    $options=[
        'cost' => 12,
    ];
    $hashed_password = password_hash($Password, PASSWORD_BCRYPT, $options);

    $stmt -> bindParam(":Names", $Names);
    $stmt -> bindParam(":Email", $Email);
    $stmt -> bindParam(":Password", $hashed_password);
    $stmt -> execute();

}