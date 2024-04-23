<?php

declare(strict_types=1);

function set_reservation($pdo, $mallId, $userId, $plate, $regDateTime, $duration, $park_Number) {
    $query = "INSERT INTO reserved (Mall_Id, userId, PlateNumber, ReservedFrom, Duration, Park_Number) VALUES (:mallId, :userId, :plate, :regDateTime, :duration, :park_Number);";
    $stmt = $pdo->prepare($query);

    $stmt -> bindParam(":mallId", $mallId);
    $stmt -> bindParam(":userId", $userId);
    $stmt -> bindParam(":plate", $plate);
    $stmt -> bindParam(":regDateTime", $regDateTime);
    $stmt -> bindParam(":duration", $duration);
    $stmt -> bindParam(":park_Number", $park_Number);
    $stmt -> execute();

}

function get_number(object $pdo, int $park_Number, int $Mall_Id){
    $query = "SELECT Park_Number FROM reserved WHERE Park_Number = :park_Number AND Mall_Id = :Mall_Id;";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":park_Number", $park_Number);
    $stmt -> bindParam(":Mall_Id", $Mall_Id);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}