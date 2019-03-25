<?php

require_once "include/php/db_conn.php";
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/14/2019
 * Time: 11:07 PM
 */
session_start();
$query = "SELECT * FROM users";
mysqli_query($conn, $query) or die('Error querying database.');

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    echo "First name : ".$row['first_name'] .'<br />'. 'Last name : ' . $row['last_name'].'<br />' . 'Mail : ' . $row['mail'] . ' ' .'<br />';
}

$index_display = "<!DOCTYPE html>
<html lang='en'>
<head><title>Login system</title></head>
<body>
<div><a href='pag/login.php'>Login</a>
<a href='pag/signup.php'>Sign-up</a></div>
</body>
</html>";
echo $index_display;

var_dump($_SESSION);