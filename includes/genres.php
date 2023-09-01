<?php

include '../admin/includes/dbh.php';
if (isset($_POST['genre'])) {
    $genre = $_POST['genre'];
    if($genre != 'All'){
    $sql = "SELECT * FROM movies WHERE hdversion != 'Movie Request' AND genres LIKE '%$genre%' ORDER BY STR_TO_DATE(release_date, '%d-%m-%Y') DESC, imdb DESC LIMIT 24";   
    }else{
    $sql = "SELECT * FROM movies WHERE hdversion != 'Movie Request' ORDER BY STR_TO_DATE(release_date, '%d-%m-%Y') DESC, imdb DESC LIMIT 24";
    }
    $query = mysqli_query($conn, $sql);

    if ($count = mysqli_num_rows($query) > 0) {?>
    <input type="hidden" id="count" value="<?php echo $count?>"><?php
        while ($rows = mysqli_fetch_assoc($query)) 
            {$date = date_create_from_format('Y-m-d', $rows['release_date']);
             $value = $rows['imdb']?>
            <div class="moviebox col-4 col-lg-2 col-sm-3">
            <a href="download?moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>">
                <div class="row1 mb-1">
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
            }?><input type="hidden" id="movieid" value="<?php echo $value?>"><?php
        }else {
            echo "<p>No Movies found</p>";
        }
    }
if (isset($_POST['genre3'])) {
    $genre = $_POST['genre3'];
    $sql = "SELECT * FROM series WHERE hdversion != 'Movie Request' AND genres LIKE '%$genre%' ORDER BY STR_TO_DATE(release_date, '%d-%m-%Y') DESC, imdb DESC LIMIT 24";
    $query = mysqli_query($conn, $sql);

    if ($count = mysqli_num_rows($query) > 0) {?>
    <input type="hidden" id="count" value="<?php echo $count?>"><?php
        while ($rows = mysqli_fetch_assoc($query)) 
            {$date = date_create_from_format('Y-m-d', $rows['release_date']);
			$value = $rows['imdb'];
            ?>
           <div class="moviebox col-4 col-lg-2 col-sm-3">
            <a href="download?moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>">		
            <div class="row1 mb-1">
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
            }?><input type="hidden" id="movieid" value="<?php echo $value?>"><?php
        }else {
            echo "<p>No Series found</p>";
        }
    }