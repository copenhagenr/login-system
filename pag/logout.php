<?php
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/25/2019
 * Time: 11:40 PM
 */

session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $_SESSION = array();
    session_destroy();
    header("location: login.php");
    exit;
}