<?php
include '../admin/includes/dbh.php';
if (isset($_POST['stream'])) {
    $stream = $_POST['stream'];
    $imdb = $_POST['imdb'];
    $descvid = $_POST['descvid'];
    $name = $_POST['seriename'];
    $episode = "SELECT DISTINCT no_of_episode FROM showmovies WHERE name_of_movie='$name' AND no_of_season = '$stream';";
    $queryepisode = mysqli_query($conn, $episode);?>
    <div class="spinner-grow d-none" style="width:3rem;height:3rem;position:relative;left:50%;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <?php
    if (mysqli_num_rows($queryepisode) > 0) {
    while ($res = mysqli_fetch_assoc($queryepisode)) { ?>
    <a href="download?id=<?php echo $_POST['serie_id']?>&moviename=<?php echo $name?>&imdb=<?php echo $imdb?>&descvid=<?php echo $descvid?>&season=<?php echo $stream?>&episode=<?php echo $res['no_of_episode']?>">
    	<li class="d-inline-block mx-2 mt-2 list-item epi-stream text-center p-2" style="border-radius:20px;cursor:pointer">Episode <?php echo $res['no_of_episode']?><input type="hidden" value="<?php echo $res['no_of_episode']?>"><span class="fs-5 playarrow material-icons">play_arrow</span></li></a><?php
    }
    }
}
if (isset($_POST['serieSeason']) && isset($_POST['serieEpisode'])) {
    $serieSeason = $_POST['serieSeason'];
    $serieEpisode = $_POST['serieEpisode'];
    $serieName = $_POST['seriename'];

    $getseries = "SELECT * FROM showmovies WHERE name_of_movie='$serieName' AND no_of_season= '$serieSeason' AND no_of_episode='$serieEpisode'";
    $queryseries = mysqli_query($conn, $getseries);
    if (mysqli_num_rows($queryseries) > 0) {
		while ($movierows = mysqli_fetch_assoc($queryseries)) {	
		if ($movierows['version'] == 1080) {?>
			<source src="<?php echo $movierows['links']?>" type="video/mp4" label="1080P"><?php
		}if ($movierows['version'] == 720) {?>
			<source src="<?php echo $movierows['links']?>" type="video/mp4" label="720P"><?php
		}if ($movierows['version'] == 480) { ?>
			<source src="<?php echo $movierows['links']?>" id='newsrc' type="video/mp4" label="480P" selected="true"><?php
		}if ($movierows['version'] == 360) { 
			if ($movierows['links'] != '') {?>
			<source src="<?php echo $movierows['links']?>" type="video/mp4" label="360P"><?php	
			}
		}if ($movierows['version'] == 240) { 
			if ($movierows['links'] != '') {?>
			<source src="<?php echo $movierows['links']?>" type="video/mp4" label="360P"><?php	
			}
		}
		}
    }else {
        header('Location: success.php?error=tryagain');
        exit();
    }
}