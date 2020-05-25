<?php

require "functions.php";

$dairyID = $_POST['dairyID'];
$type = $_POST['paperColorType'];
$coverColor = $_POST['coverColor'];
$paperColor = $_POST['paperColor'];
$paperType = $_POST['paperType'];
$coverText = $_POST['coverText'];


$result = updateDairyByID($dairyID, $type, $paperColor, $paperType, $coverColor, $coverText);

$message = getMessage($result);
header("location:editDesign.php?message=$message");

?>