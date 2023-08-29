<?php
include "../admin/includes/dbh.php";
session_start();

if (isset($_POST['liketype']) && isset($_SESSION['username'])) {
    if($_SESSION['productid'] > 0){
    $react = $_POST['liketype'];
    $moviename = $_POST['moviename'];
    $userid = $_SESSION['userid'];

    $sql = "SELECT id FROM movielikes WHERE moviename ='$moviename' AND userid ='$userid';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $delsql = "DELETE FROM movielikes WHERE moviename ='$moviename' AND userid ='$userid';";
            $delquery = mysqli_query($conn, $delsql);
    }else{
        $query = mysqli_query($conn, "INSERT INTO movielikes (userid, moviename, liketype) VALUES('$userid', '$moviename','$react')");   
    }

    $sqlup = "SELECT COUNT(*) FROM movielikes WHERE moviename='$moviename';";
    $queryup = mysqli_query($conn,$sqlup);
    $likes = mysqli_fetch_array($queryup);
    
    $rating = [
        'up' => $likes[0]
    ];
    echo json_encode($rating);
    return json_encode($rating);
    }
}
