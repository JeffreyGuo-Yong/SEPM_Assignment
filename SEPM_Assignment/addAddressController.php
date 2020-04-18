<?php

require "functions.php";

session_start();
$id = $_SESSION['id'];

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];

$result = addAddress($name, $phone, $address, $city, $postcode, $state, $id);

$message = getMessage($result);
header("location:address.php?message=$message");

?>