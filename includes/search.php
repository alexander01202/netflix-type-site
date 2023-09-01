<?php
include '../admin/includes/dbh.php';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT id,moviename,imdb,descof_video,thumbnail,movie_desc,release_date,hdversion,dateofupload FROM movies WHERE moviename LIKE '%$search%' UNION ALL SELECT id,moviename,imdb,descof_video,thumbnail,movie_desc,release_date,hdversion,dateofupload FROM series WHERE hdversion != 'Movie Request' AND moviename LIKE '%$search%' OR movie_desc='%$search%';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {    
        while ($rows = mysqli_fetch_assoc($query)) {
            $date = date_create_from_format('Y-m-d', $rows['release_date']);
            ?>		
            <div class="moviebox col-4 col-lg-2 col-sm-3">
            <a href="download?id=<?php echo $rows['id']?>&moviename=<?php echo $rows['moviename']?>&imdb=<?php echo $rows['imdb']?>&descvid=<?php echo $rows['descof_video']?>&season=1&episode=1">
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
        }
    } else {
        echo "OOPs".$_POST['search']."not found... PLS request";
        exit();
    }
}

if (isset($_POST['name'])) {
    $search = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "SELECT moviename,imdb,descof_video FROM movies WHERE moviename LIKE '%$search%' UNION ALL SELECT moviename,imdb,descof_video FROM series WHERE hdversion != 'Movie Request' AND moviename LIKE '%$search%' LIMIT 8";
    $query = mysqli_query($conn, $sql) or trigger_error("Query failed!".  mysqli_error($conn));
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $name = $row['moviename'];
            echo '<a style="overflow:hidden;text-overflow:ellipsis;"href ="download?id='.$row['id'].'&moviename='.$name.'&imdb='.$row['imdb'].'&descvid='.$row['descof_video'].'&season=1&episode=1" class = "searching">'.$name." ".'<span style="text-transform:uppercase;color:#f00;letter-spacing:1px;" class="stamp text-lowercase d-inline-block">|'.$row['descof_video'].'|</span></a>';
            echo '<div class="linesearch"></div>';
        }
    } else {
        echo '<div class = "searching">No Suggestions</div>';
    }
}