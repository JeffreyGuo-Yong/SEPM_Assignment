<?php

require "functions.php";

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$id = login($email, $password);

if(is_numeric($id) == 1){
    $_SESSION['id'] = $id;
    header("location:userIndex.php");
} else if (strpos($id, 'admin') !== false){
    $_SESSION['adminName'] = $id;
    header("location:adminIndex.php");
} else{
    $error = getMessage($id);
    header("location:login.php?message=$error");
}

?>