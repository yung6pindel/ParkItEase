<?php

declare(strict_types=1);

function is_input_empty(string $Names, string $Password, string $Email){
    if (empty($Names) || empty($Password) || empty($Email)){
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $Email){
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}
function is_email_registered(object $pdo, string $Email){
    if (get_email($pdo, $Email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $Names, string $Password, string $Email){
    set_user($pdo, $Names, $Email, $Password);
}