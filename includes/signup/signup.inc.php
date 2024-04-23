<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $Names = $_POST["Names"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        
        try {
            require_once "../dbh.inc.php";
            require_once "signup_model.inc.php";
            require_once "signup_contr.inc.php";
            
            $errors = [];
            
            if(is_input_empty($Names, $Password, $Email)){
                $errors["empty_input"] = "Fill in all fields!";
            }
            if(is_email_invalid($Email)){
                $errors["email_invalid"] = "Invalid email used!";
            }
            if(is_email_registered($pdo, $Email)){
                $errors["email_used"] = "Email already registered!";
            }
            
            require_once "../config_session.inc.php";
            if($errors){
                $_SESSION["errors_signup"] = $errors;
                $signup_errors = [
                    "Names" => $Names,
                    "Email" => $Email
                ];
                $_SESSION["signup_data"] = $signup_errors;
                header("Location: ../../login-register.php");
                die();
            }

            create_user($pdo, $Names, $Email, $Password);
            
            $_SESSION["username_user"] = $Names;	
            $_SESSION["email_user"] = $Email;	
            $_SESSION["last_regeneration"] = time();

            header("Location: ../../index.php");
            $pdo = null;    
            $stmt = null;
            die();

        } catch (PDOException $e) {
            die("Query failed: ".$e->getMessage());
        }
    } else{
        header("Location: ../../login-register.php");
        die();
    }