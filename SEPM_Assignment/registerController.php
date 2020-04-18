<?php

require "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];

$result = register($email, $password, $nickname);

if($result == "registerSuccess"){
    $message = getMessage($result);
    header("location:login.php?message=$message");
}else{
    $message = getMessage($result);
    header("location:register.php?message=$message");
}

?>