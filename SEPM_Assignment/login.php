<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="loginBody">

<div class="loginMain">
    <form action="loginController.php" method="post">
        <div class="username">
            <input class="input" type="text" placeholder="Login ID" name="email">
        </div>
        <div class="password">
            <input class="input" type="password" placeholder="Password" name="password">
        </div>
        <div>
            <button class="button" type="button" onclick="window.location.href='index.php'">Back</button>
            <button class="button" type="submit">Login</button>
        </div>
        <div class="register">
            <a href="register.php">Register Now</a>
        </div>
        <div class="message">
            <?php echo $_GET['message'] ?>
        </div>
    </form>

</div>

</body>
</html>