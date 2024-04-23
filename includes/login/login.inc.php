<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $Email = $_POST["Email"];
    $Password = $_POST["Password"]; 
    try {
        require_once "../dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";
        $login_errors = [];

        if(is_input_empty($Password, $Email)){
            $login_errors["empty_input"] = "Please fill in all fields!";
        }
        $result = get_user($pdo, $Email);
        
        if(is_email_wrong($result)){
            $login_errors["login_incorrect"] = "Wrong email or password!";
        }
        if(!is_email_wrong($result) && is_password_wrong($Password, $result["Password"])){
            $login_errors["login_incorrect"] = "Wrong email or password!";
        }
        require_once '../config_session.inc.php';

        if ($login_errors) {
            $_SESSION["errors_login"] = $login_errors;
            header("location: ../../login-register.php");
            die();  
        }

        $newSessionId = session_create_id();
        $session_Id = $newSessionId . "_" . $result["Id"]; 
        session_id($session_Id);

        $_SESSION["user_Id"] = $result["Id"];	
        $_SESSION["user_username"] = htmlspecialchars($result["Names"]);	
        $_SESSION["user_email"] = htmlspecialchars($result["Email"]);	

        $_SESSION["last_regeneration"] = time();

        header("Location: ../../index.php");
        $pdo = null;
        $stmt = null;
        die();
        } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else{
    header("location: ../../login-register.php");
    die();
}