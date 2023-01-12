<?php
 session_start();

 $username_email = $_SESSION['user-data']['username_email'] ?? null;

 unset($_SESSION['user-data']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Log in | AjWorldWeb</title>

</head>
<body>
    <main>
        <div class="container input__container">
            <div class="desc">
                <div class="circle"></div>
                <h2>Welcome back!</h2>
                <?php if(isset($_SESSION['signup-success'])): ?>
                    <small style="color:rgb(1, 167, 40);"><?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success'])
                    ?></small>
                    <?php endif ?>
            </div>
            <p>Please enter your log in details</p>
            <?php 
            if (isset($_SESSION['login-error'])): ?>      
                <small class="error">
                <?= $_SESSION['login-error'];
                unset($_SESSION['login-error']);
                ?>
            </small>
            <?php endif ?>
            
            <form class="login-input" action="login-logic.php" method="post">
                <div class="form-input">
                    <img src="assets/icon/icon2.svg" alt="">
                    <input type="text" name="username_email"
                    value="<?= $username_email; ?>"
                    placeholder="Enter your Username or Email...">
                </div>
                <div class="form-input">
                    <img src="assets/icon/icon1.svg" alt="">
                    <input type="password" name="password" placeholder="Enter your Password...">
                </div>
                <button type="submit" class="btn-input" name="submit">Log in</button>
            </form>
            <small>Don't have an account?<a href="sign-up.php">Sign up</a></small>
        </div>
    </main>
</body>
</html>
