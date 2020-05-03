<?php

require "functions.php";

$diaryID = $_POST['id'];
$content = $_POST['content'];

$result = addFeedback($content, $diaryID);

header("location:feedback.php");

?>