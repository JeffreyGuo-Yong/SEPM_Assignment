<?php
require "functions.php";
$result = getSaleHistory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sale History</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="saleHistoryBody">

<div class="saleHistoryMain">

    <?php
        if($result->num_rows != 0){
            while($history = $result->fetch_assoc()){
                echo "<div class='historyContent'>";

                echo "<div class='title'>";
                echo "<div>Our Sale History</div>";
                echo "</div>";

                echo "<div class='diary'>";
                echo "<ul>";
                echo "<li class='color1'>Paper color: </li>";
                echo "<div class='showColor' style='background-color: " . $history['paper_color'] . "'></div>";
                echo "<li>Paper type: " . $history['paper_type'] . "</li>";
                echo "<li class='color2'>Cover color: </li>";
                echo "<div class='showColor' style='background-color: " . $history['cover_color'] . "'></div>";
                echo "<li>Cover text: " . $history['cover_text'] . "</li>";
                echo "</ul>";
                echo "</div>";

                echo "<div class='information'>";
                echo "<ul>";
                echo "<li>Quantity: " . $history['quantity'] . "</li>";
                echo "<li>Amount: " . $history['amount'] . "</li>";
                echo "<li>Date: " . $history['orderDate'] . "</li>";
                echo "</ul>";
                echo "</div>";

                echo "<div class='feedback'>";
                echo "<div>Feedback: " . $history['content'] ."</div>";
                echo "</div>";

                echo "</div>";
            }
        }
    ?>

</div>

</body>
</html>