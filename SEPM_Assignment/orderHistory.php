<?php
require "functions.php";
session_start();
$id = $_SESSION['id'];
$result = getOrdersByUserID($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body>

<div class="orderHistoryMain">

    <?php

        if($result->num_rows == 0){
            echo "<div class='noRecord'>";
            echo "<p>There is no order history.</p>";
            echo "</div>";
        }else{
            while($order = $result->fetch_assoc()){
                echo "<div class='order'>";
                echo "<table>";

                echo "<tr>";
                echo "<th colspan='4'>Order Information</th>";
                echo "<td rowspan='3' class='button'>";
                echo "<button type='button' onclick='orderDetails(" . $order['id'] . ")'>Details</button>";
                echo "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Order Date:</td>";
                echo "<td>" . $order['orderDate'] . "</td>";
                echo "<td>Order Amount:</td>";
                echo "<td>" . $order['amount'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>Consignee:</td>";
                echo "<td>" . $order['name'] . "</td>";
                echo "<td>Address:</td>";
                echo "<td>" . $order['address'] . "</td>";
                echo "</tr>";

                echo "</table>";
                echo "</div>";
            }
        }

    ?>

</div>

</body>
</html>