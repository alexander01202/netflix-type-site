<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
/* @media only screen and (min-width:768px){.carousel-item{background:url("admin/poster/poster320.jpg");}}@media only screen and (max-width:768px){.carousel-item{background:url("admin/poster/poster320.jpg");}} */
@font-face {
  font-family: magison;
  src: url(fonts/Magison.ttf);
}
.span-moviename{background:linear-gradient(274deg, #ad00ff,#f50101);background-clip:text;-webkit-background-clip:text;color:transparent !important;filter:grayscale(0%);}
.moviebox{position:relative !important;}.moviebox svg path{fill:transparent;stroke-dasharray:1560;stroke-dashoffset:1560;}.moviebox:hover svg path{stroke-dasharray:1560;stroke-dashoffset:0;}.moviebox svg:hover path{animation: animate-heart 2s linear forwards}@keyframes animate-heart{0%{stroke-dashoffset: 0;}40%{stroke-dashoffset: 1560;}80%{stroke-dashoffset: 3120;fill:transparent;}100%{stroke-dashoffset: 3120;fill:#f00;}}*{margin:0;padding:0;box-sizing:border-box;color:#fff}.overlay{z-index:3;top:0;position: absolute;height:100%;width:1000px;background-image:linear-gradient(-90deg, transparent 5%, #000 60%);}.moviedesc{
-webkit-transition: 0.5s;-moz-transition: 0.5s;-o-transition: 0.5s;transition: 0.5s;position:absolute;bottom:0;left:0;-moz-transform:translateY(200px);-webkit-transform:translateY(200px);-o-transform:translateY(200px);transform:translateY(200px);opacity:0.5;width:100%;}.desc{height:100px;font-size:13px;font-weight:bold;position:relative;background:#C4C4C4;color:#101010;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;-moz-line-clamp:3;-o-line-clamp:3;-webkit-box-orient:vertical;-moz-box-orient:vertical;-o-box-orient:vertical;}.slick-slide a .row1{max-width: 180px}body{min-height:100vh;width:100%;background:#101010;font-family:'Montserrat',sans-serif}.slide{width:100%;height:530px;}.posterimage{opacity: 1;}.autoplay{opacity:0;-moz-transition:0.3s;-o-transition:0.3s;transition:0.3s;}.carousel-control-next, .carousel-control-prev{background:transparent;z-index:6;width:4%;top:50%;border-radius: 100px;height: 10%;}.carousel-caption h3 span{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-moz-line-clamp:2;-o-line-clamp:2;-webkit-box-orient:vertical;-moz-box-orient:vertical;-o-box-orient:vertical;color:red;text-transform:uppercase;font-weight: bold;}.slidestamp{font-size:16px !important;}.slide_desc{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;-moz-line-clamp:3;-o-line-clamp:3;-webkit-box-orient:vertical;-moz-box-orient:vertical;-o-box-orient:vertical;}.carousel-caption button span{font-size:14px;}.carousel-caption button{width:40%;color:white;}.carousel-caption{display:block !important;text-align:left;left:5%;z-index:4;bottom:7rem;right:65%;}.carousel-indicators .active{width:35px;opacity:1;}.carousel-indicators{bottom:10%;z-index:6;}.carousel-indicators button{margin:3px;width:20px;background:#f00;opacity:0.5;border:1px solid #f00;}.carousel-item{height:600px;background-attachment:fixed;background-position:center;background-size:cover;background-repeat:no-repeat;}.autoslide{position:absolute;top:24%}.trending{position: absolute;font-size: 30px;font-family:'Montserrat',sans-serif;top:-70px;letter-spacing: 1px;left:20px;border-left: 4px solid #f00;}.spinner-grow{display: block;margin: auto;}.autoplay button{background:transparent;margin-left:10px; border-radius:50%;outline:#fdff00;font-size:5px;width:20px;height:20px;}.displayBar{width:100%;background:#C4C4C4}.displayList{width:50%;display:inline-flex;justify-content:space-around}.moviebar{position:relative;color:#101010;font-size:36px;font-weight:bold;padding:2px 10px;z-index:1000}#marker{position:absolute;left:0;height:4px;width:0;border-bottom:4px solid red;border-top:4px solid red;background:rgb(110,106,106)}.row1{position:relative;padding:5px;overflow:hidden;width:100%}.row1 img{width:100%;height:250px}.moviebox{display:inline-block;margin:0px;padding:0px;}.moviename b{font-size: 12px}.moviename{letter-spacing:1px;text-transform:uppercase;top:100%;left:20%;white-space:nowrap;display: block;overflow: hidden;text-overflow: ellipsis;}.nav-tabs .nav-link.active{background-color:initial;border:none;color:#000}ul{padding-left:0}.dropdown-menu{top:200%;letter-spacing:.5px}.stamp{font-size:12px;color:#c4c4c4a9;margin:5px 0px}.version{font-size:14px;text-transform:uppercase;color:#fdff00;white-space:nowrap}@media only screen and (min-height: 1000px){.carousel-caption{width: 50%;}.carousel-item{height:630px;}.slide{height:630px;}}@media only screen and (min-height: 1366px){.slide{height:730px;}.carousel-item {height:800px;}}@media only screen and (min-width: 768px){.seriesimdb{font-size:16px;}.row1 .img-fluid{height:280px;}.features{font-size:18px !important;}.likeimg{width:20px !important;height:20px !important;}}@media only screen and (min-width: 1440px){.seriesimdb{font-size:22px;}.displaycategory{margin-top:5px;font-size:18px;}.carousel-caption{bottom: 4rem;}.moviename{width:75%;}.trending{border-width:8px;}.moviename{font-size: 23px;letter-spacing:1.5px;}.moviebox{width:13%;margin-left:10px;}.stamp{font-size: 18px !important;}.version{font-size: 15px;}.autoplay{max-width: 4000px !important;}.slide{height: 600px;}}@media only screen and (min-width: 1920px){*{font-size:30px;}.overlay{width:2000px;}.span-moviename{font-size:36px;}.row1 .img-fluid{height:350px;}}@media only screen and (min-width: 2200px){.seriesimdb{font-size:26px;}.autoplay{max-width:5000px!important;}#btnScrolltoTop{width:100px;height:100px;}.desc{font-size:26px;height:250px;}.moviedesc{bottom:-20px;}.slick-slide a .row1 img{height:380px;}.moviebox{width: 14%;margin-right:.3rem;margin-left:1.5rem;}.tab-pane .moviebox a .row1 img{height:550px;}.sci li a img{width:70px;}.sci li a{width:80px;height:80px;}.quickLinks ul li a{font-size:45px;}.tab-pane .moviebox a .row1{max-height:550px;} span{font-size:26px;}.moviebar{font-size: 56px;}.slide,.carousel-item{height: 1000px;}.moviename b{font-size:32px;}#marker{border-width:8px;}.stamp{font-size: 28px !important;}.trending{border-width:10px;font-size:54px;top:-150px;}.version{font-size: 28px;}}@media only screen and (min-width: 3000px){.moviename{width:75%;}#btnScrolltoTop{width:200px;height:200px;}.autoplay{max-width:6000px !important;}.trending{top:-220px;font-size:74px;border-width:12px;}.moviedesc{bottom:-400px;}.desc{height:600px;font-size:30px;}.moviename b{font-size: 38px;}.moviebox{margin-left:15px;}.slide,.carousel-item{height: 1200px;}.stamp{font-size: 34px;}.version{font-size: 36px;}.col-lg-2{width: 10%;}.slick-slide a .row1{max-width:330px;}.slick-slide a .row1 img{height:480px;}.quickLinks ul li a{font-size:60px;}.sci li a img{width:70px;}.autoslide{top: 24%;}.moviebar {font-size: 86px;}#marker{border-width:10px;}}@media only screen and (max-width: 1440px){.autoplay{max-width: 4000px !important;}.reqmovie{display:none;}.requestmov{display: block}.moviebox{width: 15%; margin-left:10px;}}@media only screen and (max-width:1366px){.autoplay{max-width:3000px!important}}@media only screen and (max-width:768px) and (max-width:1024px){.carousel-caption{bottom:4rem;width: 60%;}.carousel-caption button{width:50%;}}@media screen and (max-width: 1024px){.autoplay{max-width:2000px!important}.moviebox{width:18%;}}@media only screen and (max-width:768px){.blackfriday span,.blackfriday button{font-size:12px;}.displaycategory{margin-top:3px;font-size:15px;}.overlay{background-image:linear-gradient(180deg, transparent 5%, #000 80%);}.moviename{width:75%;}.desc{font-size:10px;height:90px;}.row1 img{height:180px}.autoslide{top:34%}.autoplay{max-width:600px!important}.searchicon{display:flex}.trending{top:-60px}.moviebox{margin-left:5px;width:23%}}@media only screen and (max-width: 580px){.displaycategory{margin-top:5px;font-size:12px;}.carousel-caption a button span,.slideimdb .material-icons{font-size:10px !important;}.releasedate,.slideimdb{font-size:14px;}.carousel-caption a button{font-size:12px;}.carousel-caption{bottom:7rem;width:70%;}.carousel-caption h1 span{font-size:20px;}.slide_desc{font-size:14px;}.slidestamp{font-size:14px !important;}.carousel-caption button{width:50%;}}@media only screen and (max-width:520px){.moviename{width:100%;}.desc{font-size:8px;height:80px;}.moviebox{width:30%;}.trending{font-size:20px;top:-40px}.stamp{font-size: 10px;}.autoslide{top:19%}.autoplay{max-width:1200px !important}.nav-link{font-size:20px}.version{font-size:12px;display: block;font-size:10px;text-overflow: ellipsis;overflow: hidden;}.autoplay> div > div > .moviebox{margin: 5px}}@media only screen and (max-width:380px){.autoplay> div > div > .moviebox{margin: 20px;}.autoplay{max-width:1200px!important;margin:10px -10px}.nav-link{font-size:18px}}.autoslide{top:19%;}}@media only screen and (min-height: 1200px){.autoslide{top:14%;}}@media only screen and (max-height: 736px){.autoslide{top:24%;}}@media only screen and (max-height: 580px){.autoslide{top:29%;}}@supports (-webkit-touch-callout: none) {
  /* CSS specific to iOS devices */ 
  .slidecarousel{
      background-attachment:scroll !important;
  }
}
</style>
<?php
include "includes/navbar.php";
?>

<!--end of modal -->
<div id="carouselExampleControls" class="carousel slide">
	<div class="carousel-inner slide">
	<!-- <div class="overlay"></div> -->
		<div class="carousel-item active" >
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
  <?php
	$query = "SELECT id,dateofupload,moviename,imdb,descof_video,movie_desc,thumbnail,genres,hdversion,rtomatoes,release_date,poster FROM movies WHERE hdversion != 'Movie Request' AND poster != '' AND REPLACE(imdb, '.', '')+0 > 70 AND REPLACE(rtomatoes, '.', '')+0 > 70 UNION ALL  SELECT id,dateofupload,moviename,imdb,descof_video,movie_desc,thumbnail,genres,hdversion,rtomatoes,release_date,poster FROM series WHERE hdversion != 'Movie Request' AND REPLACE(imdb, '.', '')+0 > 70 AND REPLACE(rtomatoes, '.', '')+0 > 70 AND poster != '' ORDER BY STR_TO_DATE(release_date, '%Y-%m-%d') DESC, dateofupload DESC, REPLACE(rtomatoes, '.', '')+0 DESC, REPLACE(imdb, '.', '')+0 DESC LIMIT 5";
			$query_run = mysqli_query($conn, $query);
			if (mysqli_num_rows($query_run) > 0) {
				
				while ($rows = mysqli_fetch_assoc($query_run)) {
					$date = date_create_from_format('Y-m-d', $rows['release_date']); ?>
					<input type="hidden" value="<?php echo $rows['thumbnail']?>" class="slidethumbnail">
    <div class="carousel-item slidecarousel active" style="background:url('admin/<?php echo $rows['poster'] ?>');background-attachment:fixed;background-position:center;background-size:cover;background-repeat:no-repeat;">
		<div class="overlay"></div>
      
      <div class="carousel-caption d-none d-md-block">
	<div data-aos="fade-right" class="mb-3">
        <h3><span class="span-moviename"><?php echo $rows['moviename']?></span></h3>
	</div>
	<div data-aos="fade-right" class="mb-2 releasedate" style="color:red;">GENRE : <?php echo '<span style="color:#fff;" class="stamp slidestamp text-uppercase">'.$rows['genres'].'</span>'?></div>
	<div data-aos="fade-right" class="mb-2 slideimdb" style="color:red;">IMDB : <span style="color:gold;font-size:14px;" class="material-icons">star</span>&nbsp;<?php echo '<span style="color:#fff;" class="stamp slidestamp text-uppercase">'.$rows['imdb'].' / 10</span>'?></div>
        <p data-aos-duration="2000" data-aos="fade-up" class="slide_desc"><?php echo $rows['movie_desc']?></p>
		<a href="https://www.yournetflixwebsite.com/download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>&season=1&episode=1">
		<button data-aos-duration="2000" data-aos="fade-up" class="btn" style="background:red;border-radius:20px;">Play Now&nbsp;&nbsp;<span class="material-icons">play_circle_filled</span>
	</button>
</a>
      </div>
    </div>
	<?php
		}
	}
?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
		</div>
	</div>
</div>

	<div class="row autoslide" style="z-index:6;">
	<span class="trending">Trending</span>
		<div class="autoplay col-md-6 col-xxl-4">
			
		</div>
	</div>

<ul class="nav nav-tabs displayBar" id="myTab" role="tablist">
	<span id="marker"></span>

	<li class="nav-item displayList activeList" role="presentation">
			<a style="border: 2px solid #000;" class="nav-link active selectMovie moviebar" id="movies-tab" data-bs-toggle="tab" href ="#movies" role="tab" aria-controls="movies" aria-selected="true">MOVIES</a>
	</li>
	<li class="nav-item displayList activeList3" role="presentation">
		<a class="nav-link moviebar" id="series-tab" data-bs-toggle="tab" href="#series" role="tab" aria-controls="series" aria-selected="false">SERIES</a>
	</li>
</ul>

		  
<section class="container-fluid tab-content my-3" style="height:100vh;" id="myTabContent">
    <div class="btn-group mb-2">
        <?php 
         if(isset($_GET['movies'])){ ?>
          <input type="hidden" class="checkmoviesrow" value="<?php echo ($_GET['movies'] * 21) + 21?>"><?php
      }else{?>
          <input type="hidden" class="checkmoviesrow" value=""><?php
      }
        ?>
  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Rows
  </button>
  <ul class="dropdown-menu" style="min-width:5rem;height:10rem;overflow-y:scroll;">
      <?php 
        $countMoviesRows = "SELECT COUNT(id) AS movie_rows FROM movies";
        $querycountMoviesRows = mysqli_query($conn,$countMoviesRows);
        if(mysqli_num_rows($querycountMoviesRows) > 0){
            $rowsofmov = mysqli_fetch_assoc($querycountMoviesRows);
            $numofmovies = floor($rowsofmov['movie_rows'] / 21);
            for ($i = 0; $i <= $numofmovies; $i++) {
                if(isset($_GET['movies'])){
                    if($_GET['movies'] == $i){?>
                        <li style="background:#000;"><a style="color:#f00;" class="dropdown-item"><?php echo $i?></a></li><?php
                    }else{?>
            <li style="color:#000;"><a class="dropdown-item" href="https://www.yournetflixwebsite.com/?movies=<?php echo $i?>"><?php echo $i?></a></li><?php
                }
                }else{?>
            <li style="color:#000;"><a class="dropdown-item" href="https://www.yournetflixwebsite.com/?movies=<?php echo $i?>"><?php echo $i?></a></li>
                    <?php
                }
            }
        }
      ?>
  </ul>
</div>
<?php
    if(isset($_GET['category'])){
        ?>
            <span class="displaycategory" style="text-decoration:underline;color:red;float:right;">category > <?php echo $_GET['category']?></span>
        <?php
    }
?>
    <div class="text-center mt-5 d-none spinner-grow displayspin" style="width: 3rem; height: 3rem;" role="status">
		<span class="text-center visually-hidden">Loading...</span>
	</div>
<div class="row tab-pane fade show active" id="movies" role="tabpanel" aria-labelledby="movies-tab">
	<?php
	if(isset($_GET['category'])){
	    $category = $_GET['category'];
	    $search='';
	    $end = '';
	    $query = "SELECT * FROM movies WHERE genres LIKE '%$category%' ORDER BY dateofupload DESC, id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";
	    }elseif(isset($_GET['search'])){
	        $category = '';
	        $end = '';
	        $search = mysqli_real_escape_string($conn,$_GET['search']);
	    $query = "SELECT id,moviename,imdb,descof_video,thumbnail,movie_desc,release_date,hdversion,dateofupload FROM movies WHERE moviename LIKE '%$search%' OR movie_desc LIKE '%$search%' UNION ALL SELECT id,moviename,imdb,descof_video,thumbnail,movie_desc,release_date,hdversion,dateofupload FROM series WHERE moviename LIKE '%$search%' OR movie_desc LIKE '%$search%' LIMIT 21;";
	    }elseif(isset($_GET['movies'])){
	        $search='';
	        $category = '';
	        $end = '';
	        $getmoviesrow = $_GET['movies'] * 21;
	        if($getmoviesrow == 0){
	            $query = "SELECT * FROM movies ORDER BY dateofupload DESC, id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";
	        }else{
	          $query = "SELECT * FROM movies ORDER BY dateofupload DESC, id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT $getmoviesrow, 21";  
	        }
	    }else{
	        $end = '';
	        $category = '';
	        $search='';
	     $query = "SELECT * FROM movies ORDER BY dateofupload DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";   
	    }
		$query_run = mysqli_query($conn, $query);
		if ($count = mysqli_num_rows($query_run) > 0) {?>
		<input type="hidden" id="category" value="<?php echo $category?>">
		<input type="hidden" id="end" value="<?php echo $end?>">
		<input type="hidden" id="searchvalue" value="<?php echo $search?>">
			<input type="hidden" id="count" value="<?php echo $count?>"><?php	
			while ($rows = mysqli_fetch_assoc($query_run)) {
			$value = $rows['dateofupload'];
			$sql = "SELECT count FROM movie_views WHERE movie_id = '".$rows['id']."'; ";
    		$query = mysqli_query($conn, $sql);
    		$views = 0;
    		if (mysqli_num_rows($query) > 0) {
    			$views_rows = mysqli_fetch_assoc($query);
    			$views += $views_rows['count'];
    		}
			$date = date_create_from_format('Y-m-d', $rows['release_date']);
			?>		
			<div style="position:relative;"class="mb-3 moviebox col-4 col-lg-2 col-sm-3">
			    <svg data-bs-toggle="modal" data-bs-target="#exampleModal" rel="tooltip" style="outline:none;z-index:2;position:absolute;right:5;margin-top:10px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
            <?php if($rows['descof_video'] == "series"){ ?>
                <a href="download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>&season=1&episode=1">
        <?php    }else{ ?>
            <a href="download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>"><?php
        }
            ?>
			<div style="position:relative;" class="row1 mb-1">
	<!--		    <span class='features' style="z-index:10;position:absolute;bottom:5%;right:10%;color:gold;font-size:14px;">-->
	<!--<span style="color:gold;font-size:14px;" class="material-icons">star</span><span>echo imdb rating here</span></span>-->
	<?php
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
			echo "<b>OOPS No Movies found</b>";
			exit();
		}
		?>
		<input type="hidden" id="movieid" value="<?php echo $value?>">
	</div>
	<div class="row tab-pane fade" id="series" role="tabpanel" aria-labelledby="series-tab">
		<?php
		if(isset($_GET['category'])){
	    $category = $_GET['category'];
	    $query = "SELECT * FROM series WHERE hdversion != 'Movie Request' AND genres LIKE '%$category%' ORDER BY dateofupload DESC,id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d') DESC, REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";
	    }else{
	     $query = "SELECT * FROM series WHERE hdversion != 'Movie Request' ORDER BY dateofupload DESC, id DESC, REPLACE(imdb, '.', '')+0 DESC,STR_TO_DATE(release_date, '%Y-%m-%d'),REPLACE(rtomatoes, '.', '')+0 DESC LIMIT 21";   
	    }
		$query_run = mysqli_query($conn, $query);
		if ($count = mysqli_num_rows($query_run) > 0) {		
			while ($rows = mysqli_fetch_assoc($query_run)) 
			{$value = $rows['dateofupload'];
			$sql = "SELECT count FROM serie_views WHERE serie_id = '".$rows['id']."'; ";
    		$query = mysqli_query($conn, $sql);
    		$views = 0;
    		if (mysqli_num_rows($query) > 0) {
    			$views_rows = mysqli_fetch_assoc($query);
    			$views += $views_rows['count'];
    		}
			$date = date_create_from_format('Y-m-d', $rows['release_date']);
			?>		
			<div class="moviebox mb-3 col-4 col-lg-2 col-sm-3">
			<a href="download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>&season=1&episode=1">
			<div style="position:relative;" class="row1 mb-1">
			    <span style="z-index:13;position:absolute;top:85%;right:10%;color:gold;font-size:14px;">
	<span style="color:gold;font-size:14px;" class="material-icons">star</span><span class='seriesimdb'><?php echo $rows['imdb']?></span></span>
	<?php
	    $selectMovielikes = "SELECT COUNT(*) AS likeno FROM movielikes WHERE moviename='".$rows['moviename']."';";
	    $querySelectMovielikes = mysqli_query($conn,$selectMovielikes);
	    if(mysqli_num_rows($querySelectMovielikes) > 0){
	        $movielikes = mysqli_fetch_assoc($querySelectMovielikes);
	        ?><span style="background:#c4c4c4;z-index:10;position:absolute;top:85%;left:5%;font-size:14px;display:flex;justify-content:center;align-items:center;">
	<span class="material-icons movielike" style="font-size:18px;padding:5px;color:black"data-bs-toggle="tooltip" data-id="up" data-bs-placement="top" title="Number of people viewed">visibility</span>
	<span class='features' style="padding:5px;color:black;"><?php echo $views?></span></span><?php
	    }
	?>
				<img class = "img-fluid" loading="lazy" src= "admin/<?php echo $rows['thumbnail']?>" alt="<?php echo $rows['moviename']?>">
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
		}
	?>
	<input type="hidden" id="movieid" value="<?php echo $value?>">
	</div>
	     <div class="text-center spinner-grow mt-5 spins" style="width: 3rem; height: 3rem;" role="status">
		<span class="text-center visually-hidden">Loading...</span>
	</div><?php   
	include "includes/footer.php";
?>		  
</section>
<!--<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
const svgs = Array.from(document.querySelectorAll('.moviebox svg'))
svgs.forEach(svg => {
	svg.addEventListener('click', (e) => {
	e.target.style.fill = "#f00"
})
})
const paths = Array.from(document.querySelectorAll('.moviebox svg path'))
paths.forEach(path => {
	path.addEventListener('click', (e) => {
	e.target.style.fill = "#f00"
})
})
const marker = document.querySelector('#marker');
const listitem = document.querySelectorAll('.navbarul li');
const displayList = document.querySelectorAll('.moviebar');
const carousel = Array.from(document.querySelectorAll('.carousel-item'));
for (let i = 0; i < carousel.length; i++) {
	if (i > 1) {
		carousel[i].classList.remove('active')
	}
	
}
var links = Array.from(listitem);
const indicator = (e) => {
    marker.style.left = e.offsetLeft+"px";
    marker.style.width = e.offsetWidth+"px";
    marker.style.height = e.offsetHeight+"px";
}
Array.from(displayList).forEach(link => {
    link.addEventListener('focus', (e) => {
        indicator(e.target);
    })
    link.addEventListener('click', (e) => {
        link.style.border = 'none'
        indicator(e.target);
    })
})
document.querySelector('.selectMovie').focus();
if ($(window).width() < 1024) {
	var i = 0;
	var arraythumbnail = [];
	$('.slidethumbnail').each(function(){
		i++;
		var slidethumbnail = $(this).val();
		arraythumbnail.push(slidethumbnail)
		if (i > 4) {
			var x = 0
			$('.slidecarousel').each(function() {
				if (!$(this).hasClass('added')) {
					$(this).css('background-image','url(admin/' + arraythumbnail[x] + ')');
				$(this).addClass('added')	
				}
				x++
			})	
		}
	})
}  
var checkmoviesrow = $('.checkmoviesrow').val();
var end = $('#end').val();
// console.log(end)
var action = "inactive"
if(checkmoviesrow !== ''){
    var Mstart = checkmoviesrow * 1;
    var start = checkmoviesrow * 1;
}else if(end !== '' && end !== 0){
    var Mstart = end * 1;
    var start = end * 1;
}else{
     var Mstart = 21;
    var start = 21;
}
var Sstart = 21;
    $(".moviebar").click(function(e) {
        var activetab = this;
        if(!$('.spins').hasClass('spinner-grow')){
            $('.spins').addClass('spinner-grow')
        }
         action = "inactive"
         start = 21;
         Mstart = 21;
         Sstart = 21;
        setTimeout(function(){ 
            if($(".tab-pane.active").html() == ''){
                $('.spins').addClass('d-none')
                $('.displayspin').removeClass('d-none')
                var selectid;
                if($(activetab).attr('id') == 'movies-tab'){
                    selectid = 'movies';
                }else{
                    selectid = 'series';
                }
                $.ajax({
                    type: "POST",
		            url: "includes/displaymovies.php",
		            data:{selectid:selectid},
		            dataType: "html",
		            success: function(data){
		          setTimeout(() => {
				        $('.displayspin').addClass('d-none')
		                $('.tab-pane.active').html(data);
		                $('.spins').removeClass('d-none')
				    }, 500);
		            }
                })
            }
            $(".tab-pane.active").siblings('.tab-pane').html('') 
        }, 300);
    })
	var movieid = $("#movieid").val()
	var check = $("section .active").attr("id")
	var category = $("#category").val()
	var searchvalue = $("#searchvalue").val()
// 		start;
		function load_more_movie(Mstart, Sstart, movieid, start, check,category,searchvalue) {
	$.ajax({
		type: "POST",
		url: "includes/loadmore.php",
		data:{check:check,
			starting:start,
			movieid:movieid,
			category:category,
			searchvalue:searchvalue
		},
		dataType: "text",
		success: function(data){
			if (data === "") {
				action = "active"
				$(".spins").addClass("d-none")
				$(".spins").removeClass("spinner-grow")
				return;
			}
			if (check === "movies") {
				$(".spins").removeClass("d-none")
				if(category == '' && searchvalue == ''){
				    var MMstart = Mstart + 21
				    var mysite = window.location.origin +"?end="+ MMstart;
				    window.history.pushState({ path: mysite}, '', mysite);
					$.ajax({
					    type: "GET",
					    url: mysite,
					    cache: false,
					   success: function (data) {
                        
                    }
					})   
				}
				setTimeout(() => {
					$("#movies").append(data);
					action = "inactive"
				}, 600);	
				return;
			}
			if (check === "series") {
				$(".spins").removeClass("d-none")
				setTimeout(() => {
					$("#series").append(data)
					action = "inactive"
				}, 600);	
				return;
			}
		}
	})
}
	$(window).scroll(function(){
	    check = $("section .active").attr("id")
			if ($(window).scrollTop() + $(window).height() > $("#"+check).height() + 350 && action === "inactive") {
			    movieid = $("#movieid").val()
				if($('.tab-pane.active').html() != ''){
				 load_more_movie(Mstart, Sstart, movieid, start, check,category,searchvalue)
				}else{
				    return;
				}
			action = "active"
			if (check === "series") {
				Sstart += 21;
				start = Sstart
			}else if(check === "movies") {
				Mstart += 21;
				start = Mstart
			}
		}
		})
})
// window.onload = setTimeout(() => {
// 	$(".nav-item .dropdown-menu li").click(function() {
// 	var input = $(this).text();
// 	$.ajax({
// 		type:'POST',
// 		url: 'includes/genres.php',
// 		data: {genre:input},
// 		dataType: "text",
// 		success: (data) => {
// 			$("#movies").html(data);
// 		}
// 	})
// 	$.ajax({
// 		type:'POST',
// 		url: 'includes/genres.php',
// 		data: {genre3:input},
// 		dataType: "text",
// 		success: (data) => {
// 			$("#series").html(data);
// 		}
// 	})
// })
// }, 2000);
</script>