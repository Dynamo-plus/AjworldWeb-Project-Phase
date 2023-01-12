<?php 
session_start();
require 'config/database.php';

if(isset($_POST['submit'])){
    //get user signup details
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //check if user fill all the input
    if(!$username){
        $_SESSION['error'] = "Please fill in your Username";
    }elseif(!$email){
        $_SESSION['error'] = "Please fill in your Email";
    }elseif(strlen($password) < 5 || strlen($confirmpassword) < 5){
        $_SESSION['error'] = "Password must be more than 4 characters";
    }elseif($password !== $confirmpassword){
        $_SESSION['error'] = "Recheck: Password does not match";
    }else{
        //encrypt users password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
    }

    //check user if email or username already exist - 
    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $user_check_result = mysqli_query($connection, $user_check_query);

    if(mysqli_num_rows($user_check_result) > 0){
        $_SESSION['error'] = "Username or Email already exist";
    }

    if($_SESSION['error']){
        $_SESSION['signup-data'] = $_POST;
        header('location: sign-up.php');
        die();
    }else{
        //insert in user signup details into database after validation
        $insert_user_query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$hashed')";

        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Account created successfully";
            header('location: index.php');
            die();
        }
    }
    
}else{
    header('location: sign-up.php');
    die();
}
?>