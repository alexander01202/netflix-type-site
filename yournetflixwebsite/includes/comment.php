<?php
include '../admin/includes/dbh.php';
session_start();
if (isset($_POST['comment'])) {
    $cmt_name =  mysqli_real_escape_string($conn, $_SESSION['username']);
    $userid =  mysqli_real_escape_string($conn, $_SESSION['userid']);
    $cmt_message =  mysqli_real_escape_string($conn, $_POST['comment']);
    $movieinput =  $_POST['moviename'];
    $sql = "INSERT INTO comments (userid, username, cmt_message, moviename) VALUES('$userid','$cmt_name', '$cmt_message', '$movieinput');";
    $res = str_replace( "\\", "", $cmt_message);
    $results = mysqli_query($conn, $sql);
    if ($results) {
        $sql="SELECT CONVERT_TZ(comment_time,'+00:00','-1:00') AS required_datetime,username,comment_id,cmt_message,moviename FROM comments WHERE moviename='$movieinput' AND cmt_message='$cmt_message';";
        $query= mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        $cmtid = $row['comment_id'];
        $sqlava = "SELECT avatar FROM register WHERE username = '".$row['username']."'";
		$queryavatar = mysqli_query($conn, $sqlava);
		$avatar = mysqli_fetch_assoc($queryavatar);
        ?>
        <div class="d-inline-block">
         <?php if ($avatar['avatar'] != '') {
           ?><img src="<?php echo substr($avatar['avatar'],3)?>" alt="" class="mx-3" style="width: 50px;height: 50px; border-radius:50%"><?php
        }else{
            ?><img src="avatar/avatar.png" alt="" class="mx-3" style="width: 50px;height: 50px; border-radius:50%"><?php
        } ?>
        <div class="linedown mt-3"  style="height:100px;position:absolute;margin-left:40px;"></div>
    </div>
    <div class="comment-dets col-4" style="position:relative;top:-50px; left: 80px">
        <div class="cmtname text-uppercase"><?php echo $cmt_name?></div>
        <div class="stamp timeago col-12" data-date="<?php echo $row['required_datetime']?>"></div>
        <div class="mt-3" style="font-size:16px;letter-spacing:1px;"><?php echo $res?></div>
        <br>
        <div class="likes col-12" style="position: relative">
        <input type="hidden" value="<?php echo $cmtid;?>" id="cmtlikeid">
            <span class="material-icons userlikes mx-2"data-bs-toggle="tooltip" data-bs-placement="top" data-id="up" title="I like this"style="font-size:20px;position:relative;cursor:pointer;">thumb_up</span>
            <?php
            $sqli = "SELECT COUNT(*) AS likeno FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'up';";
            $querys= mysqli_query($conn,$sqli);
            $rows = mysqli_fetch_assoc($querys);	
            echo '<span class="col-3 react like">'.$rows['likeno'].'</span>';
        ?>
            <span class="material-icons userlikes mx-2"style="font-size:20px;position:relative; cursor:pointer;"data-bs-toggle="tooltip"  data-id="down" data-bs-placement="top" title="I dislike this">thumb_down</span>
            <?php
            $sqli = "SELECT COUNT(*) AS likeno FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'down';";
            $querys= mysqli_query($conn,$sqli);
            $rows = mysqli_fetch_assoc($querys);
            echo '<span class="col-3 react dislike">'.$rows['likeno'].'</span>';
        ?>
        </div>
    </div>
    <?php
    } 
}
if (isset($_POST['loadmore'])) {
   $name = $_POST['movieinput'];
   $select = "SELECT COUNT(*) AS loadcnt FROM comments WHERE moviename='$name';";
   $queries = mysqli_query($conn, $select);
   $cnt =mysqli_fetch_assoc($queries);
    $sql = "SELECT CONVERT_TZ(comment_time,'+00:00','-1:00') AS required_datetime,comment_id,username,cmt_message,moviename FROM comments WHERE moviename='$name' AND comment_id > '".$_POST['loadmore']."' ORDER BY comment_id ASC LIMIT 5";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
    $cmtid = $row['comment_id'];
    $sqlava = "SELECT avatar FROM register WHERE username = '".$row['username']."';";
	$queryavatar = mysqli_query($conn, $sqlava);
	$avatar = mysqli_fetch_assoc($queryavatar);
    ?>
    <div class="d-inline-block">
         <?php if ($avatar['avatar'] != '') {
           ?><img src="<?php echo substr($avatar['avatar'],3)?>" alt="" class="mx-3" style="width: 50px;height: 50px; border-radius:50%"><?php
        }else{
            ?><img src="avatar/avatar.png" alt="" class="mx-3" style="width: 50px;height: 50px; border-radius:50%"><?php
        } ?>
        <div class="linedown mt-3"  style="height:100px;position:absolute;margin-left:40px;"></div>
    </div>
    <div class="comment-dets col-4" style="position:relative;top:-50px; left: 80px">
        <input type="hidden" value="<?php echo $cnt['loadcnt']?>" id="loadcnt">
        <div class="cmtname text-uppercase" ><?php echo $row['username']?></div>
        <div class="stamp col-12 timeago" data-date="<?php echo $row['required_datetime']?>"></div>
    <div class="mt-3" style="font-size:16px;letter-spacing:1px;"><?php echo $row['cmt_message']?></div>
    <br>
    <div class="likes col-12" style="position: relative">
    <input type="hidden" value="<?php echo $cmtid;?>" id="cmtlikeid">
    <?php
if (isset($_SESSION['userid'])) {
    $sqlup = "SELECT liketype FROM userlikes WHERE userid='".$_SESSION['userid']."' AND cmt_id='$cmtid';";
    $queryup = mysqli_query($conn, $sqlup);
    if (mysqli_num_rows($queryup) > 0) {
        $row = mysqli_fetch_assoc($queryup);
        if ($row['liketype'] === "up") {
            ?>
            <span class="material-icons userlikes likecolor mx-2"style="font-size:20px;position:relative; cursor:pointer;"data-bs-toggle="tooltip" data-id="up" data-bs-placement="top" title="I like this">thumb_up</span>
            <?php
        }else{
            ?>
                <span class="material-icons userlikes mx-2"data-bs-toggle="tooltip" data-bs-placement="top" data-id="up" title="I like this"style="font-size:20px;position:relative;cursor:pointer;">thumb_up</span>
            <?php
        }
    }else{
        ?>
            <span class="material-icons userlikes mx-2"data-bs-toggle="tooltip" data-bs-placement="top" data-id="up" title="I like this"style="font-size:20px;position:relative;cursor:pointer;">thumb_up</span>
        <?php
        }
}else{
?>
    <span class="material-icons userlikes mx-2"data-bs-toggle="tooltip" data-bs-placement="top" data-id="up" title="I like this"style="font-size:20px;position:relative;cursor:pointer;">thumb_up</span>
<?php
}
$sqli = "SELECT COUNT(*) AS likeno FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'up';";
$querys= mysqli_query($conn,$sqli);
$rows = mysqli_fetch_assoc($querys);	
echo '<span class="col-3 react like">'.$rows['likeno'].'</span>';
if (isset($_SESSION['userid'])) {
    $sqldown = "SELECT liketype FROM userlikes WHERE userid='".$_SESSION['userid']."' AND cmt_id='$cmtid';";
    $querydown = mysqli_query($conn, $sqldown);
    if (mysqli_num_rows($querydown) > 0) {
        $row = mysqli_fetch_assoc($querydown);
        if ($row['liketype'] === "down") {
            ?>
            <span class="material-icons userlikes dislikecolor mx-2"style="font-size:20px;position:relative; cursor:pointer;"data-bs-toggle="tooltip"  data-id="down" data-bs-placement="top" title="I dislike this">thumb_down</span>
            <?php
        }else{
            ?>
                <span class="material-icons userlikes mx-2"data-bs-toggle="tooltip" data-bs-placement="top" data-id="down" title="I dislike this" style="font-size:20px;position:relative;cursor:pointer;">thumb_down</span>
            <?php
        }
    }else{
        ?>
        <span class="material-icons userlikes mx-2"style="font-size:20px;position:relative; cursor:pointer;" data-bs-toggle="tooltip"  data-id="down" data-bs-placement="top" title="I dislike this">thumb_down</span>
        <?php
    }
}else{
    ?>
    <span class="material-icons userlikes mx-2"style="font-size:20px;position:relative; cursor:pointer;"data-bs-toggle="tooltip"  data-id="down" data-bs-placement="top" title="I dislike this">thumb_down</span>
    <?php
}
    $sqli = "SELECT COUNT(*) AS likeno FROM userlikes WHERE cmt_id='$cmtid' AND liketype = 'down';";
    $querys= mysqli_query($conn,$sqli);
    $rows = mysqli_fetch_assoc($querys);
    echo '<span class="col-3 react dislike">'.$rows['likeno'].'</span>';
    ?>
    </div>
</div>
<?php
    } 
?>
    <button class="btn btn-outline-warning" id="loadmore" data-id="<?php echo $cmtid;?>"><span role="status" aria-hidden="true"></span>Load More</button>
<?php
}
}