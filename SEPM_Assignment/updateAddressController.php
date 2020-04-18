<?php

require "functions.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$addressID = $_POST['addressID'];

$result = updateAddress($name, $phone, $address, $city,$postcode, $state, $addressID);

$message = getMessage($result);
header("location:address.php?message=$message");

?>