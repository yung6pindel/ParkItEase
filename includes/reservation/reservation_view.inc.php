<?php
declare(strict_types=1);
function check_reservation_errors(){
    if(isset($_SESSION['reservation_errors'])){
        $error_reservation = $_SESSION["reservation_errors"];
        echo "<br>";
        echo '<p class="form-error"><b>';
        foreach ($error_reservation as $error) {
        echo $error . ' ';
        }
        echo '</b></p>';
        unset($_SESSION['reservation_errors']);
    }
}