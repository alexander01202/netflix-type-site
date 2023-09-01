<?php
session_start();
include '../admin/includes/dbh.php';
if(isset($_POST['selectid'])){
    $select = $_POST['selectid'];
	$query = "SELECT * FROM $select WHERE hdversion != 'Movie Request' ORDER BY dateofupload DESC,id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";
		$query_run = mysqli_query($conn, $query);
	if ($count = mysqli_num_rows($query_run) > 0) {?>
			<input type="hidden" id="count" value="<?php echo $count?>"><?php	
	while ($rows = mysqli_fetch_assoc($query_run)) {
	$value = $rows['dateofupload'];
	$date = date_create_from_format('Y-m-d', $rows['release_date']);
	$sql = '';
    if($select == "movies"){
        $sql = "SELECT count FROM movie_views WHERE movie_id = '".$rows['id']."'; ";   
    }elseif($select == "series"){
        $sql = "SELECT count FROM serie_views WHERE serie_id = '".$rows['id']."'; ";
    }
	$query = mysqli_query($conn, $sql);
    	 $views = 0;
    	 if (mysqli_num_rows($query) > 0) {
    	    $views_rows = mysqli_fetch_assoc($query);
    	    $views += $views_rows['count'];
    	 }
			?>		
			<div class="moviebox col-4 col-lg-2 col-sm-3">
			    <svg data-bs-toggle="modal" data-bs-target="#exampleModal" style="outline:none;z-index:2;position:absolute;right:5;margin-top:10px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="36.104px" height="36.104px" viewBox="-5 0 196.104 176.104" style="enable-background:new 0 0 176.104 176.104;"
	 xml:space="preserve">
<g>
	<g>
		<path style="stroke-width:10px;stroke:#f00;" d="M150.383,18.301c-7.13-3.928-15.308-6.187-24.033-6.187c-15.394,0-29.18,7.015-38.283,18.015
			c-9.146-11-22.919-18.015-38.334-18.015c-8.704,0-16.867,2.259-24.013,6.187C10.388,26.792,0,43.117,0,61.878
			C0,67.249,0.874,72.4,2.457,77.219c8.537,38.374,85.61,86.771,85.61,86.771s77.022-48.396,85.571-86.771
			c1.583-4.819,2.466-9.977,2.466-15.341C176.104,43.124,165.716,26.804,150.383,18.301z"/>
	</g>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
			<a href="download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>&season=1&episode=1">
			<div style="position:relative;" class="row1 mb-1">
			    <?php 
			        if($select == "series"){?>
			            <span class='features' style="z-index:10;position:absolute;bottom:5%;right:10%;color:gold;font-size:14px;">
	<span style="color:gold;font-size:14px;" class="material-icons">star</span><span><?php echo $rows['imdb']?></span></span>
			        <?php };
	    $selectMovielikes = "SELECT COUNT(*) AS likeno FROM movielikes WHERE moviename='".$rows['moviename']."';";
	    $querySelectMovielikes = mysqli_query($conn,$selectMovielikes);
	    if(mysqli_num_rows($querySelectMovielikes) > 0){
	        $movielikes = mysqli_fetch_assoc($querySelectMovielikes);
	        ?><span style="background:#c4c4c4;z-index:10;position:absolute;bottom:5%;left:5%;display:flex;justify-content:center;align-items:center;">
	<span class="material-icons movielike" style="font-size:18px;padding:5px;color:black"data-bs-toggle="tooltip" data-id="up" data-bs-placement="top" title="Number of people viewed">visibility</span>
	<span class='features' style="padding:5px;color:black;"><?php echo $views?></span></span><?php
	    }
	?>
				<img class = "img-fluid" src= "admin/<?php echo $rows['thumbnail']?>" alt="<?php echo $rows['moviename']?>">
				<span class="moviedesc">
					<div class="desc">
						<?php echo $rows["movie_desc"]?>
					</div>
				</span>
			</div>
				<span class="moviename"><b><?php echo $rows['moviename']?></b></span>
				<h6 class="stamp"><?php echo date_format($date, 'M-j-Y')?></h6>
				<h6 class="version"><?php echo $rows['hdversion']?></h6>
			</a>
			</div>
		<?php
			}
		}else {
			echo "OOPS No Movies found!!! ):";
		}
		?>
		<input type="hidden" id="movieid" value="<?php echo $value?>"><?php
}		