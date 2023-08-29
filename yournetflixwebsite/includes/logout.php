<?php include '../admin/includes/dbh.php';
setcookie('usertoken', '', time() - 3600,"/");
setcookie('userid', '', time() - 3600, "/");
session_start();
$sql = "DELETE FROM logintoken WHERE userid='".$_SESSION['userid']."';";
$query = mysqli_query($conn, $sql);
session_unset();
$_SESSION = array();
session_regenerate_id(true);
if (session_destroy()) {
    unset($_SESSION);
    header("Location: https://www.yournetflixwebsite.com");
    exit();
}