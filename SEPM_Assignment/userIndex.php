<?php
require "functions.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Index</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="mainBody">

<div class="mainTop">
    <div class="title">Welcome: <?php echo getUserName($_SESSION['id'])?></div>
    <div>
        <button type="button" class="button" onclick="window.location.href='logoutController.php'">Logout</button>
    </div>
</div>
<div class="mainLeft">
    <ul>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="orderDiary.php" target="userIframe">Order Diary</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="orderHistory.php" target="userIframe">Order History</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="feedback.php" target="userIframe">My Feedback</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="address.php" target="userIframe">My Address</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="payment.php" target="userIframe">My Payment</a> </li>
    </ul>
</div>
<div class="mainRight">
    <iframe id="iframe" name="userIframe" frameborder="0" src="welcome.html"></iframe>
</div>

</body>
</html>