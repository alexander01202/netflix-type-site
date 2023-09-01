<?php
include "../admin/includes/dbh.php";
session_start();

if (isset($_POST['liketype']) && isset($_SESSION['username'])) {
    $react = $_POST['liketype'];
    $cmtid = $_POST['cmtid'];
    $userid = $_SESSION['userid'];

    $sql = "SELECT id FROM userlikes WHERE cmt_id ='$cmtid' AND userid ='$userid';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $sqli = "SELECT * FROM userlikes WHERE cmt_id ='$cmtid' AND userid ='$userid' AND liketype='$react';";
        $results = mysqli_query($conn, $sqli);
        if (mysqli_num_rows($results) > 0) {
            $delsql = "DELETE FROM userlikes WHERE cmt_id ='$cmtid' AND userid ='$userid' AND liketype='$react';";
            $delquery = mysqli_query($conn, $delsql);
        }else{
            $query = mysqli_query($conn, "UPDATE userlikes SET liketype='$react' WHERE cmt_id ='$cmtid' AND userid ='$userid';");
        }   
    }else{
        $query = mysqli_query($conn, "INSERT INTO userlikes (userid, cmt_id, liketype) VALUES('$userid', '$cmtid', '$react')");   
    }

    $sqldown = "SELECT COUNT(*) FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'down';";
    $sqlup = "SELECT COUNT(*) FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'up';";

    $querydown = mysqli_query($conn,$sqldown);
    $queryup = mysqli_query($conn,$sqlup);

    $dislikes = mysqli_fetch_array($querydown);
    $likes = mysqli_fetch_array($queryup);
    
    $rating = [
        'up' => $likes[0],
        'down' => $dislikes[0]
    ];
    echo json_encode($rating);
    return json_encode($rating);
}
