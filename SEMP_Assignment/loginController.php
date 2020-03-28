<?php

require "functions.php";

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$id = login($email, $password);

if(is_numeric($id) == 1){
    header("location:userIndex.php");
}else{
    $error = getErrorMessage($id);
    header("location:login.php?error=$error");
}

?>