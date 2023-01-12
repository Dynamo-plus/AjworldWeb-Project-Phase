<?php
session_start();
require 'config/database.php';

//check if user click on login button before accessing the homepage
if(isset($_POST['submit'])){

    //fetch login details data
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //check if empty input is sent
    if(!$username_email){
        $_SESSION['login-error'] = "Username or Email is required";
    }elseif(!$password){
        $_SESSION['login-error'] = "Password is required";
    }else{
        //check if user details matches database record
        $get_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email' ";
        $get_user_result = mysqli_query($connection, $get_user_query);

        if(mysqli_num_rows($get_user_result) == 1){
            //fetch the data of the user from database
            $user_record = mysqli_fetch_assoc($get_user_result);
            $db_password = $user_record['password'];

            if(password_verify($password, $db_password)){
                //set session
                $_SESSION['user-id'] = $user_record['id'];
                header('location: homepage.php');
                die();
            }else{
                //please check your input
                $_SESSION['login-error'] = "Please check your input";
            }
        }else{
            $_SESSION['login-error'] = "User not found";
        }
    }

  if($_SESSION['login-error']){
    $_SESSION['user-data'] = $_POST;
    header('location: index.php');
    die();
  } 
}else{
    header('location: index.php');
    die();
}

?>
