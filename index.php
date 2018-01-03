<?php
require_once "classes/db.inc.php";
$db=new db();
$q='';
if(isset($_GET['query'])){
    $q="where movie_name like '%{$_GET['query']}%'";
}

$sql=$db->print_movies($q);
session_start();
if(isset($_GET['out'])){
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cinema</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"/>
    <link rel="icon" href="myico.ico"/>
    <script src="js/slider.js" type="text/javascript"></script>
</head>
<body>

<header>
    <div class="navation">
        <ul>
            <li><a href="#">ALL</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Comedy</a></li>
            <li><a href="#">Drama</a></li>
            <li><a href="#">Horror</a></li>
            <li><a href="#">History</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="?out"><i class="fa fa-sign-out fa-lg"></i></a></li>
        </ul>
        <form method="get">
        <input type="search" name="query" placeholder="Search for Movies">
        </form>
    </div>
</header>

    <section>
        <div class="slider">
            <img src="slider/s1.jpg" class="slider-img">
            <img src="slider/s2.jpg" class="slider-img">
            <img src="slider/s3.jpg" class="slider-img">
            <img src="slider/s4.jpg" class="slider-img">
            <img src="slider/s5.jpg" class="slider-img">
            <img src="slider/s6.jpg" class="slider-img">
        </div>
        <div class="movies">

            <div class="left">
                <div class="title">Movies</div>
                <div class="movies-row">
                    <?php
                    while($r=mysqli_fetch_assoc($sql)){
                        echo '
                    <a href="play.php?movie='.$r["ID"].'">
                 <div class="movie-box">
                        <div class="movie-img">
                            <img src="img/'.$r["poster"].'">
                        </div>
                        <div class="movie-info">
                            <div class="movie-name">
                                <i class="fa fa-film"></i> '.$r["movie_name"].'
                            </div>
                            <div class="movie-type">
                                <i class="fa fa-file-movie-o"></i> '.$r["movie_type"].'
                                <span id="views"><i class="fa fa-eye"></i>'.$r["views"].'</span>
                            </div>
                        </div>
                    </div></a>
                ';

                    }
                    ?>


                </div>
            </div>
            <div class="right">
                <div class="title">Must Views</div>
                <div class="movie-box">
                    <div class="movie-img">
                        <img src="img/movie1.jpg">
                    </div>
                    <div class="movie-info">
                        <div class="movie-name">
                            <i class="fa fa-film"></i> [Name]
                        </div>
                        <div class="movie-type">
                            <i class="fa fa-file-movie-o"></i> [Type]
                        </div>
                    </div>
                </div>
                <div class="movie-box">
                    <div class="movie-img">
                        <img src="img/movie2.jpg">
                    </div>
                    <div class="movie-info">
                        <div class="movie-name">
                            <i class="fa fa-film"></i> [Name]
                        </div>
                        <div class="movie-type">
                            <i class="fa fa-file-movie-o"></i> [Type]
                        </div>
                    </div>
                </div>
                <div class="movie-box">
                    <div class="movie-img">
                        <img src="img/movie3.jpg">
                    </div>
                    <div class="movie-info">
                        <div class="movie-name">
                            <i class="fa fa-film"></i> [Name]
                        </div>
                        <div class="movie-type">
                            <i class="fa fa-file-movie-o"></i> [Type]
                        </div>
                    </div>
                </div>
                <div class="movie-box">
                    <div class="movie-img">
                        <img src="img/movie4.jpg">
                    </div>
                    <div class="movie-info">
                        <div class="movie-name">
                            <i class="fa fa-film"></i> [Name]
                        </div>
                        <div class="movie-type">
                            <i class="fa fa-file-movie-o"></i> [Type]
                        </div>
                    </div>
                </div>
                <div class="movie-box">
                    <div class="movie-img">
                        <img src="img/movie5.jpg">
                    </div>
                    <div class="movie-info">
                        <div class="movie-name">
                            <i class="fa fa-film"></i> [Name]
                        </div>
                        <div class="movie-type">
                            <i class="fa fa-file-movie-o"></i> [Type]
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>
</body>
</html>