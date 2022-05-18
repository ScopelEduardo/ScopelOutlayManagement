<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../web/css/user/login.css">
</head>
<body>
<div class="login-container">
    <section class="login" id="login">
        <header>
            <h2>OutlayManagement</h2>
            <h4>Login</h4>
        </header>
        <form name="login-form" class="login-form" action="../../controller/LoginController.php" method="post">
            <input type="text" name="username" class="login-input" placeholder="Username" required autofocus/>
            <input type="password" name="password" class="login-input" placeholder="Password" required/>
            <div class="submit-container">
                <a href="CreateAccount.php" class="login-button">Create Account</a>
                <button type="submit" class="login-button">Sign In</button>
            </div>
        </form>
    </section>
</div>
<!--<button id="e1">Login error!</button>-->
<script src="../web/js/user/login.js"></script>
</body>
</html>
