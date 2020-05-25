<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Index</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="mainBody">

<div class="mainTop">
    <div class="title">Welcome: <?php echo $_SESSION['adminName']?></div>
    <div>
        <button type="button" class="button" onclick="window.location.href='logoutController.php'">Logout</button>
    </div>
</div>
<div class="mainLeft">
    <ul>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="editDesign.php" target="adminIframe">Edit Design</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="adminSaleHistory.php" target="adminIframe">Sale History</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="adminReport.php" target="adminIframe">Generate report</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="adminManageAccount.php" target="adminIframe">Manage Account</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="adminManageFeedback.php" target="adminIframe">Moderate Feedback</a> </li>
        <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="adminManageAdministrator.php" target="adminIframe">Manage Administrator</a> </li>
    </ul>
</div>
<div class="mainRight">
    <iframe id="iframe" name="adminIframe" frameborder="0" src="welcome.html"></iframe>
</div>

</body>
</html>