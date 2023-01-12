<?php
session_start();
require "config/database.php";
if(!isset($_SESSION['user-id'])){
    header('location: index.php');
    die();
}else{
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);

    $get_id_query = "SELECT * FROM users WHERE id = '$id'";
    $get_id_result = mysqli_query($connection, $get_id_query);

    if($get_id_result){
        $data = mysqli_fetch_assoc($get_id_result);
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage-style.css">
    <title>Welcome | AjworldWeb</title>
</head>
<body>
    <nav>
        <a href="logout.php">
            <img src="assets/icon/icon-logout.svg" alt="">
            <h4>Log Out</h4>
        </a>
    </nav>
    <h1>Hi <?= ucfirst($data['username']); ?>, Welcome to Homepage</h1>
    
</body>
</html>