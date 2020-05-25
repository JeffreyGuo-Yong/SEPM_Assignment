<?php
require "functions.php";
$result = adminGetAllAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Administrator</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body >

<div class="feedback">
    <p class="message"><?php echo $_GET['message'] ?></p>

    <?php
    if($result->num_rows != 0){
        echo "<div class='addminBody'>";
        echo "<p>Administrator Information</p>";
        echo "<table>";
        echo "<tr class = 'tr-title'>";
        echo "<td>ID</td>";
        echo "<td>Username</td>";
        echo "<td>Password</td>";
        echo "</tr>";
        while($feedback = $result->fetch_assoc()){
            echo "<tr class='tr-body'>";
            echo "<td>" .$feedback['id']. "</td>";
            echo "<td>" . $feedback['username'] . "</td>";
            echo "<td>" . $feedback['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    ?>

    <button class="addAdmin" type="button" onclick="window.location.href='addAdmin.php'">Add Administrator</button>
</div>

</body>
</html>