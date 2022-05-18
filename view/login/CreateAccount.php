<?php
    if (isset($_POST['error'])){
        //todo error message
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../web/css/user/login.css">
</head>
<body>
<div class="login-container">
    <section class="login" id="login">
        <header>
            <h2>OutlayManagement</h2>
            <h4>Create Account</h4>
        </header>
        <form name="create-account-form" class="login-form" action="../../controller/LoginController.php" method="post">
            <input type="text" name="username" class="login-input" placeholder="Username" required autofocus/>
            <input type="text" name="firstname" class="login-input" placeholder="Firstname" required/>
            <input type="text" name="lastname" class="login-input" placeholder="Lastname" required/>
            <input type="password" name="password" class="login-input" placeholder="Password" required/>
            <input type="password" name="confirm_password" class="login-input" placeholder="Confirm Password" required/>
            <div class="submit-container">
                <a href="Login.php" class="login-button">Login</a>
                <button type="submit" class="login-button">Create Account</button>
            </div>
        </form>
    </section>
</div>
<!--<button id="e1">Login error!</button>-->
<script src="../web/js/user/login.js"></script>
</body>
</html>
