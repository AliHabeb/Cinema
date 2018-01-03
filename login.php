<?php
require_once 'classes/db.inc.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $db=new db();
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if($db->login($user,$pass)){
        session_start();
        $_SESSION['user']=$user;
        header("location:upload.php");
    }else{
        echo "<script>alert('Wrong UserName or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="icon" href="favorite.ico"/>
    <link rel="stylesheet" href="css/play.css" type="text/css"/>
</head>
<body>
<div class="login">
    <form method="post">
        <fieldset>
            <legend>Login Form</legend>

            <table>
                <tr>
                    <td>UserName</td>
                    <td><input type="text" name="user" autocomplete="no" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass" autocomplete="no" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>
