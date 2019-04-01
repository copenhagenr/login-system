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

if (isset($_POST['submit']) && $_POST['submit'] == 'login') {
    $sql = "SELECT count(*) FROM users WHERE mail = ? and passwword = ? and login_attempts <> 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $_POST["mail"], $_POST["password"]);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 1) {
        $_SESSION['login'] = true;
        $_SEESION['mail'] = $_POST['mail'];
        header("Location: ../index.php");
    } else {
        $sql = "SELECT mail,login_attempts FROM users WHERE mail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_POST["mail"]);
        $stmt->execute();
        $stmt->bind_result($mail, $login_display);
        $stmt->fetch();
        $stmt->close();
        if ($login_display == 0) {
            $error = 'Account is blocked too many times try to login ! Reset your account ';
        } else {
            $sql = "UPDATE users SET login_attempts = (login_attempts - 1)  WHERE mail = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $_POST["mail"]);
            $stmt->execute();
            $stmt->fetch();
            $stmt->close();
            $error = 'Wrong matching mail with password !';
        }
    }
}


$login_display = "<!DOCTYPE html>
<html lang='en'>

    <head>
        <title>Login system</title>
    </head>
    
    <body>
        <div><a href='login.php'>Login</a>
            <a href='signup.php'>Sign-up</a></div>
        <div>
            <form action='login.php' method='post'>
                Mail: <input type='text' name='mail'><span style='color:red'>*</span></br>
                Password: <input type='password' name='password'><span style='color:red'>*</span></br>
                <input type='submit' name='submit' value='login'> 
            </form> 
            <p>$error</p>
        </div>
    </body>
</html>";

echo $login_display;