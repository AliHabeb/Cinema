<?php
require_once "classes/db.inc.php";
$db=new db();
$id=$_GET['movie'];
$sql=$db->get_movie($id);
$m=mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/play.css" type="text/css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"/>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
</head>
<body>
<header>

</header>
<section>
    <div class="movie">
        <div class="player">
            <video controls height="100%" width="720">
                <source src="movies/<?= $m['movie_file']?>">
            </video>
        </div>
        <div class="info">
            <div><i class="fa fa-film fa-lg"></i><?=$m['movie_name']?></div>
            <div><i class="fa fa-file-movie-o fa-lg"></i><?=$m['movie_type']?></div>
            <div><i class="fa fa-eye fa-lg"></i><i id="views"><?=$m['views']?></i></div>
        </div>

    </div>
</section>
<footer>

</footer>
</body>
</html>

<script>
    $("video").one("play",function () {
        $.post("ajax.php",{id:<?=$id?>},function (data) {
            $("#views").html(parseInt($("#views").html())+1);
        });
    });
</script>

