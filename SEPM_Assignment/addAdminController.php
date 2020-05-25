<?php

require "functions.php";

$username = $_POST['username'];
$password = $_POST['password'];

$result = addAdmin($username, $password);

$message = getMessage($result);
header("location:adminManageAdministrator.php?message=$message");

?>