<?php
include '../admin/includes/dbh.php';
if(isset($_POST['replyrequest'])){
    $message = mysqli_real_escape_string($conn,$_POST['replyrequest']);
    $messageid = $_POST['requestid'];
 $sql = "INSERT INTO replyrequest(messageid,message) VALUES('$messageid','$message')";
$query = mysqli_query($conn, $sql);
$res = str_replace( "\\", "", $message);
$selectReplies = "SELECT CONVERT_TZ(replytime,'+00:00','-1:00') AS replied_time,id,messageid,message FROM replyrequest WHERE messageid = '$messageid';";
$querySelectReplies = mysqli_query($conn, $selectReplies);
$fetchReplies = mysqli_fetch_assoc($querySelectReplies);
?>
 <span style="color:#c4c4c4;" class="material-icons">reply</span>
<div style="text-align:right;color:#c4c4c4;font-variant: all-petite-caps;"><?php echo $res ?></div>
<div class="stamp timeago" style="font-size:10px;text-align:right;" data-time="<?php echo $fetchReplyRequest['replied_time'];?>">
			</div><?php
   
}
