<?php
require "functions.php";
$orderID = $_GET['id'];
$result = getOrderDetailsByOrderID($orderID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="orderDetailsMain">

    <?php

        echo "<table>";

        echo "<tr>";
        echo "<th colspan='4'>Diary Information</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td colspan='2'>Cover Color Type:</td>";
        echo "<td colspan='2'>" . $result['d_type'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Cover Color:</td>";
        echo "<td> <div class='showColor' style='background-color: " . $result['cover_color'] . "'></div> </td>";
        echo "<td>Cover Text:</td>";
        echo "<td>" . $result['cover_text'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Paper Color:</td>";
        echo "<td> <div class='showColor' style='background-color: " . $result['paper_color'] . "'></div> </td>";
        echo "<td>Paper Type:</td>";
        echo "<td>" . $result['paper_type'] . "</td>";
        echo "</tr>";

        echo "</table>";

        echo "<table>";

        echo "<tr>";
        echo "<th colspan='4'>Order Information</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Diary Quantity:</td>";
        echo "<td>" . $result['quantity'] . "</td>";
        echo "<td>Unit Price:</td>";
        echo "<td>" . $result['unit_price'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Postage:</td>";
        echo "<td>" . $result['postage'] . "</td>";
        echo "<td>Order Amount:</td>";
        echo "<td>" . $result['amount'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th colspan='4'>Mailing Information</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Consignee:</td>";
        echo "<td>" . $result['name'] . "</td>";
        echo "<td>Phone:</td>";
        echo "<td>" . $result['phone'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Address:</td>";
        echo "<td>" . $result['address'] . "</td>";
        echo "<td>City:</td>";
        echo "<td>" . $result['city'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>State:</td>";
        echo "<td>" . $result['state'] . "</td>";
        echo "<td>Postcode:</td>";
        echo "<td>" . $result['postcode'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th colspan='4'>Payment Information</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td colspan='2'>Payment Type:</td>";
        echo "<td colspan='2'>" . $result['p_type'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Holder:</td>";
        echo "<td>" . $result['cardholder'] . "</td>";
        echo "<td>Account:</td>";
        echo "<td>" . $result['account'] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Expire Date:</td>";
        echo "<td>" . $result['expire_date'] . "</td>";
        echo "<td>CVV:</td>";
        echo "<td>" . $result['cvv'] . "</td>";
        echo "</tr>";

        echo "</table>";

    ?>

    <div class="button">
        <button type="button" onclick="window.location.href = 'orderHistory.php'">Back</button>
    </div>

</div>

</body>
</html>