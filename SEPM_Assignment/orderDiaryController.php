<?php

require "functions.php";

session_start();
$userID = $_SESSION['id'];

/*
 * wrong name setting
 * paperColorType = type
 * paperColor = coverColor
 * paperTheme = coverTheme
 * coverColor = paperColor
 */
$coverColorType = $_POST['paperColorType'];
$coverColor = $_POST['paperColor'];
$coverTheme = $_POST['paperTheme'];
$paperType = $_POST['paperType'];
$paperColor = $_POST['coverColor'];
$coverText = $_POST['coverText'];

if($coverTheme == null){
    $coverTheme = 0;
}

$unitPrice = $_POST['unitPrice'];
$quantity = $_POST['quantity'];
$paymentID = $_POST['paymentID'];
$addressID = $_POST['addressID'];
$postage = $_POST['postage'];
$totalPrice = $_POST['totalPrice'];

if(($totalPrice-$postage) != ($unitPrice * $quantity)){
    $totalPrice = ($unitPrice * $quantity) + $postage;
}

$result = addDiary($coverColorType, $paperColor, $paperType, $coverColor, $coverText, $coverTheme, $userID, $quantity, $unitPrice, $postage, $totalPrice, $addressID, $paymentID);

$message = getMessage($result);
header("location:orderDiary.php?message=$message");

?>