<?php
require "functions.php";
session_start();
$id = $_SESSION['id'];
$result = getPaymentByUserID($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Payment Method</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body>

    <div class="addPayment">
        <a href="addPayment.html">Add New Payment Method</a>
        <p><?php echo $_GET['message'] ?></p>
    </div>

    <div class="paymentMain">

        <?php

            if($result->num_rows == 0){
                echo "<div class='noRecord'>";
                echo "<p>There is no payment method information, Please add new payment method.</p>";
                echo "</div>";
            }else{

                while($row = $result->fetch_assoc()){
                    echo "<div class='payment'>";
                    echo "<table>";

                    echo "<tr>";
                    echo "<td class='title'>Type:</td>";
                    echo "<td colspan='3'>" . $row['type'] . "</td>";
                    echo "<td class='button' rowspan='4'>";
                    echo "<button type='button' onclick='userEditPayment(" . $row['id'] . ")'>Edit</button>";
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>Holder:</td>";
                    echo "<td colspan='3'>" . $row['cardholder'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>Account:</td>";
                    echo "<td colspan='3'>" . $row['account'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='title'>Expire Date:</td>";
                    echo "<td>" . $row['expire_date'] . "</td>";
                    echo "<td class='title'>CVV:</td>";
                    echo "<td>" . $row['cvv'] . "</td>";
                    echo "</tr>";

                    echo "</table>";
                    echo "</div>";
                }

            }

        ?>

    </div>

</body>
</html>