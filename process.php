<?php 

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
}

// Verification for filled inputs
if(!isset($user) || $user == '' || !isset($message) || $message == '') {
	$error = "Please fill inputs";
	header("Location: index.php?error=".urlencode($error));
    exit();
}

else {

	 // Insert query
    $query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$time')";
}


// Verification to dont insert empty string
if(!mysqli_query($con, $query)) {
	die('Error:' .mysqli_error($con));
}
else {
	header("Location: index.php");
	exit();
}


?>
