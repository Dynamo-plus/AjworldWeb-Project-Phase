<?php
session_start();

$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;

unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign up | AjworldWeb</title>
</head>
<body>
    <main>
        <div class="container sign-up__container">
            <div class="desc">
                <div class="circle"></div>
                <h2>Welcome back!</h2>
            </div>
            <?php if(isset($_SESSION['error'])): ?><small class="error">
            <?= $_SESSION['error'];
                unset($_SESSION['error']); 
            ?>
            </small>
            <?php endif ?>
            <form action="logic.php" method="post">
                <div class="sign_up-input">
                    <div class="form-input">
                        <img src="assets/icon/icon2.svg" alt="">
                        <input type="text" name="username" value="<?= $username ?>" placeholder="Enter your Username...">
                    </div>
                    <div class="form-input">
                        <img src="assets/icon/icon3.svg" alt="">
                        <input type="email" name="email" value="<?= $email ?>" placeholder="Enter your Email...">
                    </div>
                    <div class="form-input">
                        <img src="assets/icon/icon1.svg" alt="">
                        <input type="password" name="password" placeholder="Enter your Password...">
                    </div>
                    <div class="form-input">
                        <img src="assets/icon/icon1.svg" alt="">
                        <input type="password" name="confirmpassword" placeholder="Please confirm your Password...">
                    </div>
                </div>
                
                <button type="submit" class="btn-input" name="submit">Sign up</button>
            </form>
            <small>Already have an account? <a href="index.php">Log in</a></small>
        </div>
    </main>
</body>
</html>
