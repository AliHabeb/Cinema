<?php
session_start();
if(!isset($_SESSION['user'])){
header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Movie</title>
    <link rel="stylesheet" href="css/play.css"/>
    <link rel="icon" href="favorite.ico"/>
</head>
<body>
<header>

</header>
<section>
    <div class="upload">
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Upload Movie</legend>

                <table>
                    <tr>
                        <td>Movie Name</td>
                        <td><input type="text" name="movie_name" required></td>
                    </tr>
                    <tr>
                        <td>Movie Type</td>
                        <td>
                            <select name="movie_type" required>
                                <option selected disabled>Select Type..</option>
                                <option>Action</option>
                                <option>Comedy</option>
                                <option>Horror</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Movie</td>
                        <td><input type="file" name="movie_file" required></td>
                    </tr>
                    <tr>
                        <td>Poster</td>
                        <td><input type="file" name="movie_poster" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Upload" required></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</section>
<footer>

</footer>
</body>
</html>

<?php
require_once "classes/db.inc.php";
$db=new db();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $m_dir="movies/";
    $p_dir="img/";
    $move=$_FILES["movie_file"];
    $poster=$_FILES["movie_poster"];
    $m=move_uploaded_file($move['tmp_name'],$m_dir.$move['name']);
    $p=move_uploaded_file($poster['tmp_name'],$p_dir.$poster['name']);

    $_POST['move_file']=$move['name'];
    $_POST['poster']=$poster['name'];
    if($m&&$p){
        $db->add_move($_POST);
    }

}


?>
