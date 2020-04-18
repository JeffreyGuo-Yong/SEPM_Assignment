<?php
require "functions.php";
$addressID = $_GET['id'];
$result = getAddressByAddressID($addressID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Address</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="addAddressBody">

<div class="addAddressMain">

    <form action="updateAddressController.php" method="post">
        <div class="inputDiv">
            <?php
                echo "<input class='input' type='text' placeholder='Name' name='name' value='" . $result['name'] ."'>";
            ?>
        </div>

        <div class="inputDiv">
            <?php
                echo "<input class='input' type='text' placeholder='Phone Number' name='phone' value='" . $result['phone'] ."'>";
            ?>
        </div>

        <div class="inputDiv">
            <?php
                echo "<input class='input' type='text' placeholder='Address' name='address' value='" . $result['address'] ."'>";
            ?>
        </div>

        <div class="inputDiv">
            <?php
                echo "<input class='input' type='text' placeholder='City' name='city' value='" . $result['city'] ."'>";
            ?>
        </div>

        <div class="inputDiv">
            <?php
                echo "<input class='input' type='text' placeholder='Postcode' name='postcode' value='" . $result['postcode'] ."'>";
            ?>
        </div>

        <div class="selectDiv">
            State:
            <select name="state">
                <option value="ACT">Australian Capital Territory</option>
                <option value="NSW">New South Wales</option>
                <option value="NT ">Northern Territory</option>
                <option value="QLD">Queensland</option>
                <option value="SA ">South Australia</option>
                <option value="TAS">Tasmania</option>
                <option value="VIC" selected="selected">Victoria</option>
                <option value="WA ">Western Australia</option>
            </select>
        </div>

        <?php
            echo "<input type='text' name='addressID' hidden='hidden' value='" . $addressID . "'>";
        ?>

        <div class="buttonDiv">
            <button type="button" onclick="window.location.href='address.php'">Back</button>
            <button type="submit">Update</button>
        </div>
    </form>

</div>

</body>
</html>