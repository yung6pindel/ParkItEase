<?php
    declare(strict_types=1);
    function is_input_empty(string $Password, string $email){
        if(empty($Password) || empty($email)){
            return true;
        } else{
            return false;
        }
    }
    function is_email_wrong(bool|array $result){
        if(!$result){
            return true;
        } else{
            return false;
        }
    }
    function is_password_wrong(string $pwd, string $hashed_pwd){
        if(!password_verify($pwd, $hashed_pwd)){
            return true;
        } else{
            return false;
        }
    }