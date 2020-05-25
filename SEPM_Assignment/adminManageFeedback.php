<?php
require "functions.php";
$result = adminGetAllFeedback();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Feedback</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body >

    <div class="feedback">
        <p class="message"><?php echo $_GET['message'] ?></p>

        <?php
            if($result->num_rows != 0){
                echo "<div class='feedbackbody'>";
                echo "<p>Feedback</p>";
                echo "<table>";
                echo "<tr class = 'tr-title'>";
                echo "<td>ID</td>";
                echo "<td>Dairy ID</td>";
                echo "<td>Content</td>";
                echo "<td>Date</td>";
                echo "<td></td>";
                echo "</tr>";
                while($feedback = $result->fetch_assoc()){
                    echo "<tr class='tr-body'>";
                    echo "<td>" .$feedback['id']. "</td>";
                    echo "<td>" . $feedback['diary_id'] . "</td>";
                    echo "<td>" . $feedback['content'] . "</td>";
                    echo "<td>" . $feedback['date'] . "</td>";
                    echo "<td><button type='button' onclick='adminEditFeedback(" . $feedback['id'] . ")'>Edit</button></td>" ;
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
        ?>
    </div>

</body>
</html>