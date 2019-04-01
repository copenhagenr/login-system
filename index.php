<?php

require_once "include/php/db_conn.php";
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/14/2019
 * Time: 11:07 PM
 */
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $login = "<a href='pag/logout.php'>Logout</a>";
} else {
    $login = "<a href='pag/login.php'>Login</a>";
}
$index_display = "<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Login system</title>
    </head>
    
    <body>
        <div>
            $login
            <a href='pag/signup.php'>Sign-up</a>
        </div>
    </body>
</html>";
echo $index_display;