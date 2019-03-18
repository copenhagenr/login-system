<?php
/**
 * Created by PhpStorm.
 * User: dNz-
 * Date: 3/18/2019
 * Time: 11:04 PM
 */

$signup_display = "<!DOCTYPE html>
<html lang='en'>
<head><title>Login system</title></head>
<body>
<div><a href='login.php'>Login</a>
<a href='signup.php'>Sign-up</a></div>
<div>
<form action='signup.php'>
Mail: <input type='text' name='mail'><span style='color:red'>*</span></br>
Password: <input type='password' name='password'><span style='color:red'>*</span></br>
User name: <input type='text' name='user_name'></br>
First name: <input type='text' name='first_name'></br>
Last name: <input type='text' name='last_name'></br>
Phone: <input type='text' name='phone'></br>
Address: <input type='text' name='address'></br>
</form> 
</div>
</body>
</html>";

echo $signup_display;