<?php 
session_start();
include 'database.php';

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM shouts WHERE id = $id";
    
    // Verification
    if (!mysqli_query($con, $query)) {
        die('Error: '. mysqli_error($con));
    } else {
        header("Location: index.php");
        exit();
    }
}

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
    // Set Time zone
    $time = date("d.m.y", time());
    
    // Verification for filled inputs
    if(empty($user) || empty($message)) {
        $error = "Please fill inputs";
        $_SESSION['error'] = $error;
        header("Location: index.php");
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$time')";
        
        if(!mysqli_query($con, $query)) {
            die('Error:' .mysqli_error($con));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
