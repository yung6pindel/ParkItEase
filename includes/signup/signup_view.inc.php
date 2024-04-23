<?php

declare(strict_types=1);

function signup_input(){
    if(isset($_SESSION["signup_data"]["Names"])){
        echo '<input type="text" name="Names" placeholder="Име и фамилия" value="' . $_SESSION["signup_data"]["Names"] . '" />';
    }
    else{
        echo '<input type="text" name="Names" placeholder="Име и фамилия" />';
    }
    echo '<input type="password" name="Password" placeholder="Парола" />';
    if(isset($_SESSION["signup_data"]["Email"]) && !isset($_SESSION["errors_signup"]["email_used"]) 
    && !isset($_SESSION["errors_signup"]["email_invalid"])){
        echo '<input type="email" name="Email" placeholder="Е-майл адрес" value="' . $_SESSION["signup_data"]["Email"] . '" />';
    }
    else{
        echo '<input type="email" name="Email" placeholder="Е-майл адрес" />';
    }
}

function check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];
        echo '<p class="form-error"><b>';
            foreach ($errors as $error) {
            echo $error . ' ';
        }
        echo '</b></p>';
        unset($_SESSION['errors_signup']);
    }
}