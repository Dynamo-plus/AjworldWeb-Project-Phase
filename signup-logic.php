<?php
//collect all user details and insert into the db
// if username is equal to another name preexiting in the db then return username has been taken
// check all input are filled none is left blank;
//hash the users password before forwarding it to the database;
//check if password is equal to confirm password
session_start();
require 'config/database.php';

if(isset($_POST['submit'])){

//Get sign up data

    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username){
        //set an error session
        $_SESSION['signup'] = "Please enter a Username";
        echo 'error in username'; 
    }elseif (!$email) {
        // set an error session...
        $_SESSION['signup'] = "Please enter your email address";
        echo 'error in email';
    }elseif (strlen($password) < 5 || strlen($confirmpassword) < 5){
        // set an error session...
        $_SESSION['signup'] = "Password must be more than 4 characters";
        echo 'error in password'; 
    }else{
        if ($password !== $confirmpassword){
            $_SESSION['signup'] = "Password do not match";
            echo 'error';
        }else{
            //hash password
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            echo $hashed;

            //check if Username has not been taken
            $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);

            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exist";
                echo 'email exist';
            }else{
                echo "good to go";
            }
        }    
    }

}else{
    
    header('location: sign-up.php');
    die();
}
?>

