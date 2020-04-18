<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="registerBody">

<div class="registerMain">
    <form action="registerController.php" method="post">
        <div class="inputDiv">
            <input class="input" type="text" placeholder="Email Address" name="email">
        </div>
        <div class="inputDiv">
            <input class="input" type="text" placeholder="Nickname" name="nickname">
        </div>
        <div class="inputDiv">
            <input class="input" type="password" placeholder="Password" name="password">
        </div>
        <div>
            <button class="button" type="submit">Register</button>
        </div>
        <div class="message">

        </div>
    </form>
</div>

</body>
</html>