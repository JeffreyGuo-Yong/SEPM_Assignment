<?php
require "functions.php";
$paymentID = $_GET['id'];
$result = getPaymentByPaymentID($paymentID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Payment Method</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<div class="addPaymentMain">

    <form action="updatePaymentController.php" method="post">

        <div class="radioDiv">
            <div class="paymentTypeTitle">Payment Method:</div>
            <div class="paymentType">
                <?php
                    if($result['type'] == "Card"){
                        echo "<div class='option'>";
                        echo "<input type='radio' name='paymentMethod' value='Card' checked='checked' disabled='disabled'>";
                        echo "</div>";
                        echo "<div class='optionName'>";
                        echo "Card";
                        echo "</div>";

                        echo "<div class='option'>";
                        echo "<input type='radio' name='paymentMethod' value='PayPal' disabled='disabled'>";
                        echo "</div>";
                        echo "<div class='optionName'>";
                        echo "PayPal";
                        echo "</div>";
                    }else{
                        echo "<div class='option'>";
                        echo "<input type='radio' name='paymentMethod' value='Card' disabled='disabled'>";
                        echo "</div>";
                        echo "<div class='optionName'>";
                        echo "Card";
                        echo "</div>";

                        echo "<div class='option'>";
                        echo "<input type='radio' name='paymentMethod' value='PayPal' checked='checked' disabled='disabled'>";
                        echo "</div>";
                        echo "<div class='optionName'>";
                        echo "PayPal";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>

        <div class="inputDiv">
            <?php
                if($result['type'] == "Card"){
                    echo "<input class='input' type='text' placeholder='Card Holder' name='holder' value='" . $result['cardholder'] . "'>";
                }else{
                    echo "<input class='input' type='text' placeholder='Account Holder' name='holder' value='" . $result['cardholder'] . "'>";
                }
            ?>
        </div>

        <div class="inputDiv">
            <?php
                if($result['type'] == "Card"){
                    echo "<input class='input' type='text' placeholder='Account Number' name='account' value='" . $result['account'] . "'>";
                }else{
                    echo "<input class='input' type='text' placeholder='Account Email Address' name='account' value='" . $result['account'] . "'>";
                }
            ?>
        </div>

        <div class="inputDiv">
            <?php
                if($result['type'] == "Card"){
                    echo "<input class='input' type='text' placeholder='Expire Date' name='date' value='" . $result['expire_date'] . "'>";
                }else{
                    echo "<input class='input' type='text' placeholder='Expire Date' name='date' disabled='disabled' value='" . $result['expire_date'] . "'>";
                }
            ?>
        </div>

        <div class="inputDiv">
            <?php
                if($result['type'] == "Card"){
                    echo "<input class='input' type='text' placeholder='CVV' name='cvv' value='" . $result['cvv'] . "'>";
                }else{
                    echo "<input class='input' type='text' placeholder='CVV' name='cvv' disabled='disabled' value='" . $result['cvv'] . "'>";
                }
            ?>
        </div>

        <?php
            echo "<input type='text' name='paymentID' hidden='hidden' value='" . $paymentID . "'>";
        ?>

        <div class="buttonDiv">
            <button type="button" onclick="window.location.href='payment.php'">Back</button>
            <button type="submit">Submit</button>
        </div>

    </form>

</div>

</body>
</html>