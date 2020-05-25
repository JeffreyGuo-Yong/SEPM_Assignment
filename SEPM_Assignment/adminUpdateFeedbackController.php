<?php

require "functions.php";

$feedbackID = $_POST['feedbackID'];
$content = $_POST['content'];

$result = updateFeedbackById($feedbackID, $content);

$message = getMessage($result);
header("location:adminManageFeedback.php?message=$message");

?>