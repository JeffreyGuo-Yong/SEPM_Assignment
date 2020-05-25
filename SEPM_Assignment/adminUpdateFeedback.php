<?php
require "functions.php";
$feedbackID = $_GET['id'];
$result = getFeedbackByID($feedbackID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Feedback</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="addAddressBody">

<div class="addAddressMain">

    <form action="adminUpdateFeedbackController.php" method="post">
        <?php
            echo "<input type='text' name='feedbackID' hidden='hidden' value='" . $feedbackID . "'>";
        ?>
        <div class="inputDiv">
            <?php
                echo "<textarea class='feedback' name='content'>" . $result['content'] . "</textarea>"
            ?>
        </div>
        <div class="buttonDiv">
            <button type="button" onclick="window.location.href='adminManageFeedback.php'">Back</button>
            <button type="submit">Update</button>
        </div>
    </form>

</div>

</body>
</html>