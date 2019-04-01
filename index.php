<?php

require_once "include/php/db_conn.php";
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/14/2019
 * Time: 11:07 PM
 */
session_start();
$user_page = '';
$sign_up = '';

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $login_stage = "<a href='pag/logout.php'>Logout</a>";
    $user_page = "<a href='pag/user_page.php'>Welcome ". $_SESSION['mail'] . "</a>";

} else {
    $login_stage = "<a href='pag/login.php'>Login</a>";
    $sign_up = "<a href='pag/signup.php'>Sign-up</a>";
}
$index_display = "<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Login system</title>
    </head>
    
    <body>
        <div>
            $sign_up
            $user_page    
            $login_stage       
        </div>
    </body>
</html>";
echo $index_display;