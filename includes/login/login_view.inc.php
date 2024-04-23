<?php
    declare(strict_types=1);
    function check_login_errors(){
        if(isset($_SESSION['errors_login'])){
            $login_error = $_SESSION["errors_login"];
            echo "<br>";
            echo '<p class="form-error"><b>';
            foreach ($login_error as $error) {
            echo $error . ' ';
            }
            echo '</b></p>';
            unset($_SESSION['errors_login']);
        }
    }