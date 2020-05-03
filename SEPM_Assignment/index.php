<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="indexBody">

<div class="indexTop">
    <div class="indexTop_top">
        <div class="title">Easy Edit Company</div>
        <div>
            <button type="button" class="button" onclick="window.location.href='login.php'">Login</button>
        </div>
    </div>
    <div class="indexTop_bottom">
        <div class="options">
            <ul>
                <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="contactInformation.html" target="indexIframe">Content us</a> </li>
                <li onmouseover="changeToGray(this)" onmouseout="changeToNon(this)"> <a href="saleHistory.php" target="indexIframe">Sale History</a> </li>
            </ul>
        </div>
    </div>
</div>

<div class="indexMiddle">
    <iframe id="iframe" name="indexIframe" frameborder="0" src="contactInformation.html"></iframe>
</div>

<div class="indexBottom">
    <div>
        Group Members:
        s3699534 Yong Guo,
        s3758525 YiYi He,
        s3748845 Ke Xu,
        s3699777 QiaoChu Wang,
        s3593406 TianQia Guo,
        s3686344 ZeYu Liu
    </div>
</div>

</body>
</html>