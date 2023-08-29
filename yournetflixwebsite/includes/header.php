<?php
	include "admin/includes/dbh.php";
	session_start();	
	if(isset($_COOKIE['usertoken']) && !isset($_SESSION['userid'])) {
        $verifyUser = "SELECT * FROM logintoken WHERE userid='".$_COOKIE['userid']."';";
        $queryverifyUser = mysqli_query($conn,$verifyUser);
        if(mysqli_num_rows($queryverifyUser) > 0){
            $fetchtoken = mysqli_fetch_assoc($queryverifyUser);
            $loginUser = "SELECT * FROM register WHERE id='".$fetchtoken['userid']."';";
                $queryLoginUser = mysqli_query($conn, $loginUser);
                if(mysqli_num_rows($queryLoginUser) > 0){
                    $fetchUser = mysqli_fetch_assoc($queryLoginUser);
                    $_SESSION['userid'] = $fetchUser['id'];
                    $_SESSION['email'] = $fetchUser['email'];
                    $_SESSION['username'] = $fetchUser['username'];
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="robots" content="index, follow">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<?php if($_SERVER['PHP_SELF'] == '/index.php'){
	?>
	<title>yournetflixwebsite</title>
	<link as="style" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" as="style" href="https://fonts.googleapis.com/icon?family=Material+Icons" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" as="style" rel="stylesheet" crossorigin="anonymous">
	<link media="print" onload="this.media='all';this.onload=null;" rel="stylesheet" href="style.css">
<noscript><link rel="stylesheet" href="style.css"></noscript>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>