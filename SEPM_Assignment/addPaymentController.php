<?php

require "functions.php";

session_start();
$id = $_SESSION['id'];

$paymentMethod = $_POST['paymentMethod'];
$holder = $_POST['holder'];
$account = $_POST['account'];
$date =$_POST['date'];
$cvv = $_POST['cvv'];

$result = addPayment($paymentMethod, $holder, $account, $date, $cvv, $id);

$message = getMessage($result);
header("location:payment.php?message=$message");

?>