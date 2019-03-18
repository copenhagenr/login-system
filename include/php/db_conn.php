<?php
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/18/2019
 * Time: 10:31 PM
 */

if(!function_exists('mysqli_connect') && !extension_loaded('mysqli')){
    exit('Mysqli extension is dosen\'t load in php, activate it first !');
}

$conn = mysqli_connect('localhost','root','','lphp');

if(!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
