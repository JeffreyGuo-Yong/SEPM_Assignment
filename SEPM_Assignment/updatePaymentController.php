<?php

require "functions.php";

$paymentID = $_POST['paymentID'];
$holder = $_POST['holder'];
$account = $_POST['account'];
$date =$_POST['date'];
$cvv = $_POST['cvv'];

$result = updatePayment($holder, $account, $date, $cvv, $paymentID);

$message = getMessage($result);
header("location:payment.php?message=$message");

?>