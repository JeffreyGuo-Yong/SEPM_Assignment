<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body>

    <div class="addAdminMain">
        <form action="addAdminController.php" method="post" onsubmit="return addAdmin()">
            <div class="inputDiv">
                <input class="input" type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="inputDiv">
                <input class="input" type="password" placeholder="Password" name="password">
            </div>
            <div>
                <button class="button" type="button" onclick="window.location.href='adminManageAdministrator.php'">Back</button>
                <button class="button" type="submit">Add</button>
            </div>
        </form>
        <p>Note: the username of administrator must begin with 'admin'.</p>
    </div>

</body>
</html>