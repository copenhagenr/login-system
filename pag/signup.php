<?php
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/18/2019
 * Time: 11:04 PM
 */
require_once "../include/php/db_conn.php";
session_start();
$error = '';
if (isset($_POST['submit']) && $_POST['submit'] == 'signup') {
    if (isset($_POST['mail']) && !is_null($_POST['mail']) && isset($_POST['password']) && !is_null($_POST['password'])) {
        //check account exist yet
        $sql = "SELECT count(*) FROM users WHERE mail = ? and passwword = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $_POST["mail"], $_POST["password"]);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        if ($count == 1) {
            $error = 'Account already exist for this mail';
        } else {
            $sql = "INSERT INTO users (mail, passwword, first_name, last_name, user_name, phone, address) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $_POST['mail'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['user_name'], $_POST['phone'], $_POST['address']);
            $stmt->execute();
            $stmt->fetch();
            if( $stmt->affected_rows == 1) {
                echo "Account was creating will be login automatic and redirect ...";
                $_SESSION['login'] = true;
                $_SEESION['mail'] = $_POST['mail'];
                header("Location: ../index.php");
            } else {
                $error = "Error at creating account please retry";
            }
        }
    } else {
        $error = 'Mail and password is mandatory';
    }


}

$signup_display = "<!DOCTYPE html>
<html lang='en'>

    <head>
        <title>Login system</title>
    </head>
    
    <body>
        <div><a href='login.php'>Login</a>
            <a href='signup.php'>Sign-up</a></div>
        <div>
            <form action='signup.php' method='post'>
                Mail: <input type='text' name='mail'><span style='color:red'>*</span></br>
                Password: <input type='password' name='password'><span style='color:red'>*</span></br>
                User name: <input type='text' name='user_name'></br>
                First name: <input type='text' name='first_name'></br>
                Last name: <input type='text' name='last_name'></br>
                Phone: <input type='text' name='phone'></br>
                Address: <input type='text' name='address'></br>
                <input type='submit' name='submit' value='signup'> 
            </form> 
            <p>$error</p>
        </div>
    </body>
</html>";

echo $signup_display;

