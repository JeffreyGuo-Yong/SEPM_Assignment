<?php
require "functions.php";
session_start();
$id = $_SESSION['id'];
$result = getAddressByUserID($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Address</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="addressBody">

    <div class="addAddress">
        <a href="addAddress.html">Add New Address</a>
        <p><?php echo $_GET['message'] ?></p>
    </div>

    <div class="addressMain">

        <?php

            if($result->num_rows == 0){
                echo "<div class='noRecord'>";
                echo "<p>There is no address information, Please add new address.</p>";
                echo "</div>";
            }else{

                while($row = $result->fetch_assoc()){
                    echo "<div class='address'>";
                    echo "<table>";

                    echo "<tr>";
                    echo "<td class='title'>Name:</td>";
                    echo "<td colspan='3'>" . $row['name'] . "</td>";
                    echo "<td class='button' rowspan='5'>";
                    echo "<button type='button' onclick='userEditAddress(" . $row['id'] . ")'>Edit</button>";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>Phone:</td>";
                    echo "<td colspan='3'>" . $row['phone'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>Address:</td>";
                    echo "<td colspan='3'>" . $row['address'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>City:</td>";
                    echo "<td colspan='3'>" . $row['city'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>State:</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td class='title'>Postcode:</td>";
                    echo "<td>" . $row['postcode'] . "</td>";
                    echo "</tr>";

                    echo "</table>";
                    echo "</div>";
                }

            }

        ?>

    </div>

</body>
</html>