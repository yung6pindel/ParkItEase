<?php
$random = rand(100, 999);
$mallId = $_POST["mallId"];
$userId = $_POST["userId"];
$regPlate = $_POST["regPlate"];
$plate = strtoupper($regPlate);
$regDateTime = $_POST["regDateTime"];
$duration = $_POST["duration"];
$park_Number = $random;
$park_Numbers_Taken = 100;
try {
    require_once "../dbh.inc.php";
    require_once "reservation_model.inc.php";
    require_once "reservation_contr.inc.php";
    $errors_reservation = [];
    if(is_input_empty($regPlate, $regDateTime, $duration)){
        $errors_reservation["empty_input"] = "Попълнете всички полета!";
    }
    if(is_plate_invalid($plate)){
        $errors_reservation["plate_invalid"] = "Попълнете валиден регистрационен номер!";
    }
    if(is_date_invalid($regDateTime)){
        $errors_reservation["date_invalid"] = "Попълнете бъдеща дата и/или час!";
    }
    while (is_number_taken($pdo, $park_Number, $mallId)) {
        $random = rand(100, 999);
        $park_Number = $random;
        $park_Numbers_Taken++;
        if($park_Numbers_Taken >= 1000){
            $errors_reservation["parking_full"] = "Съжаляваме, но всички паркоместа са заети!";
            $park_Numbers_Taken = 100;
            break;
        }
    }
    require_once '../config_session.inc.php';
    if($errors_reservation){
        $_SESSION["reservation_errors"] = $errors_reservation;
        if(isset($_POST['mallId']) && $_POST['mallId'] === '1'){
            header("Location: ../../mallplaza.php?mallId=".$mallId."&userId=".$userId);
        } else if(isset($_POST['mallId']) && $_POST['mallId'] === '2'){
            header("Location: ../../mallplovdiv.php?mallId=".$mallId."&userId=".$userId);
        } else if(isset($_POST['mallId']) && $_POST['mallId'] === '3'){
            header("Location: ../../mallmarkovo.php?mallId=".$mallId."&userId=".$userId);
        }
        die();
    }
    create_reservation($pdo, $mallId, $userId, $plate, $regDateTime, $duration, $park_Number);
    header("Location: ../../index.php");
    $pdo = null;    
    $stmt = null;
    die();
} catch (PDOException $e) {
    die("Query failed: ".$e->getMessage());
}