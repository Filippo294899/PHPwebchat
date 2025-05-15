<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/Forms.css">
</head>
<body>
    <div class="Form-Login">
        <form id="Login" method="post">
            <input name="User" autocomplete="off" placeholder="NickName" />
            <input type="password" name="Password" autocomplete="off" placeholder="Password" />
            <button id="send" type="submit">Register</button>
        </form>

        <form method="get" action="Login.php">
            <button type="submit" style="margin-top: 10px;">Torna al Login</button>
        </form>

    </div>
</body>
</html>
