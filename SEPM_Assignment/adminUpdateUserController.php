<?php

require "functions.php";

$userID = $_GET['id'];
$type = $_GET['type'];

if($type == "block"){
    $result = blockUserById($userID);
}else{
    $result = unblockUserById($userID);
}

$message = getMessage($result);
header("location:adminManageAccount.php?message=$message");

?>