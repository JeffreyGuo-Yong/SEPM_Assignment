<?php
require "functions.php";
session_start();
$id = $_SESSION['id'];
$diaryResult = getDiaryByUserID($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Feedback</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="feedbackMain">

    <?php

        if($diaryResult->num_rows == 0){
            echo "<div class='noRecord'>";
            echo "<p>There is no item can be replied.</p>";
            echo "</div>";
        }else{
            while($diary = $diaryResult->fetch_assoc()){
                echo "<div class=\"feedback\">";
                echo "<table>";

                echo "<tr>";
                echo "<th colspan='4'>Diary Information</th>";
                echo "<tr>";

                echo "<tr>";
                echo "<td colspan='2'>Cover Color Type:</td>";
                echo "<td colspan='2'>" . $diary['d_type'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Cover Color:</td>";
                echo "<td> <div class='showColor' style='background-color: " . $diary['cover_color'] . "'></div> </td>";
                echo "<td>Cover Text:</td>";
                echo "<td>" . $diary['cover_text'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Paper Color:</td>";
                echo "<td> <div class='showColor' style='background-color: " . $diary['paper_color'] . "'></div> </td>";
                echo "<td>Paper Type:</td>";
                echo "<td>" . $diary['paper_type'] . "</td>";
                echo "</tr>";

                $feedbackResult = getFeedbackByDiaryID($diary['id']);

                if($feedbackResult == null){
                    echo "<tr>";
                    echo "<form action='addFeedbackController.php' method='post'>";

                    echo "<td colspan='4'>";
                    echo "<textarea name='content' placeholder=\"Please give your feedback.\"></textarea>";
                    echo "<input name='id' hidden='hidden' value='" . $diary['id'] . "'>";
                    echo "<div class='button'>";
                    echo "<button type='submit'>Reply</button>";
                    echo "</div>";
                    echo "</td>";

                    echo "</form>";
                    echo "<tr>";
                }else{
                    echo "<tr>";
                    echo "<td colspan='4'>";

                    echo "Feedback Date: " . $feedbackResult['date'] . "<br/>" . $feedbackResult['content'];

                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            }
        }

    ?>

</div>

</body>
</html>