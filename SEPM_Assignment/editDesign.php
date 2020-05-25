<?php
require "functions.php";
$result = adminGetAllDiary();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Design</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body >

<div class="feedback">
    <p class="message"><?php echo $_GET['message'] ?></p>
    <?php
        if($result->num_rows != 0){

                echo "<div class='feedbackbody'>";
                echo "<p>Edit Design</p>";
                echo "<table>";
                echo "<tr class = 'tr-title'>";
                echo "<td>ID</td>";
                echo "<td>Type</td>";
                echo "<td>Paper Type</td>";
                echo "<td>Cover Color</td>";
                echo "<td>Paper Color</td>";
                echo "<td>Cover Text</td>";
                echo "<td>User ID</td>";
                echo "<td></td>";
                echo "</tr>";
                while($diary = $result->fetch_assoc()){

                echo "<tr class='tr-body'>";
                echo "<td>" .$diary['id']. "</td>";
                echo "<td>" . $diary['type'] . "</td>";
                echo "<td>" . $diary['paper_type'] . "</td>";
                echo "<td style = 'background-color:" . $diary['cover_color'] . "'></td>";
                echo "<td style = 'background-color:" . $diary['paper_color'] . "'></td>";
                echo "<td>" . $diary['cover_text'] . "</td>";
                echo "<td>" . $diary['user_id'] . "</td>";
                echo "<td><button type='button' onclick='adminEditDairy(" . $diary['id'] . ")'>Edit</button></td>" ;
                echo "</tr>";
            }
                echo "</table>";
            

                echo "</div>";
            }
    ?>
</div>

</body>
</html>