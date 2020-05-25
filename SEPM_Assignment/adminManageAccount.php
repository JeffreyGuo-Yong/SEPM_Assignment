<?php
require "functions.php";
$result = adminGetAllUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Account </title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body >

<div class="feedback">

    <p class="message"><?php echo $_GET['message'] ?></p>

    <?php
    if($result->num_rows != 0){

        echo "<div class='feedbackbody'>";
        echo "<p>User Information</p>";
        echo "<table>";
        echo "<tr class = 'tr-title'>";
        echo "<td>ID</td>";
        echo "<td>E-mail</td>";
        echo "<td>Nickname</td>";
        echo "<td>Usability</td>";
        echo "<td></td>";
        echo "</tr>";

        while($user = $result->fetch_assoc()){
            $usability = $user['usability'];
            echo "<tr class='tr-body'>";
            echo "<td>" .$user['id']. "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['nickname'] . "</td>";
            echo "<td>" . $usability . "</td>";
            if($usability == 0){
                echo "<td><button type='button' onclick='adminBlockUser(" . $user['id'] . ")'>Block</button></td>";
            }else{
                echo "<td><button type='button' onclick='adminUnblockUser(" . $user['id'] . ")'>Unblock</button></td>";
            }
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    }
    ?>

</div>

</body>
</html>