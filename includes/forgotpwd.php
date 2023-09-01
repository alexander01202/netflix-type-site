<?php
include '../admin/includes/dbh.php';
session_start();

if (isset($_POST['forgotpwd'])) {
    if (isset($_SESSION['userid'])) {
        header("location: ../profile?error=changepwdhere");
        exit();
    }
    $email = $_POST['email'];
    $check = "SELECT * FROM register WHERE email='$email';";
    $queryCheck = mysqli_query($conn,$check);
    if (mysqli_num_rows($queryCheck) <= 0) {
        header("location: https://www.yournetflixwebsite.com/reset-password?error=nouser");
        exit();
    }
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(8);

    $url = "https://www.yournetflixwebsite.com/create-new-pwd?selector=".$selector."&validator=".bin2hex($token);

    $expires = date("U") + 1200;

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
    }else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES(?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
    }else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $email;
    $subject = "Reset Your Password for yournetflixwebsite";
    $message = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        overflow: scroll;
    }
    .container{
        width: 100%;
        height:auto;
         background: #c4c4c4;
    }
    .wrapper{
        width: 80%;
        background: #262626;
        height: 100%;
        margin: auto;
        padding: 20px;
    }
    img{
        position: relative;
        left: 50%;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div style="padding:15px;"><img style="width:100px;height:100px;border-radius:50%;" src="https://www.yournetflixwebsite.com/icons/logo.png" alt="Logo"></div>
            <div style="height:3px;background:#f00;width:100%"></div>
            <div style="padding:15px;margin-top:20px">
                <p>The link to reset your password is below, If you did not make this request please ignore</p><br><br>';
    $message .= '<p><b>Here is Your password Reset Link:</b><br><br>';
    $message .= '<a href="'.$url.'">'.$url.'</a></p>';
    $message .='   </div>
        </div>
    </div>
</body>
</html>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: yournetflixwebsite <sharehd@yournetflixwebsite.com>\r\n";
    $headers .= "Reply-To: yournetflixwebsite@yournetflixwebsite.com\r\n";
    if(mail($to, $subject, $message, $headers)){
     header("location: ../reset-password?success=resetsuccess");
     exit();
    }else{
        header("location: ../reset-password?error=tryagain");
        exit();
    }
}else {
    header("location: ../index");
}