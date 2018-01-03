<?php
require_once "classes/db.inc.php";
$db=new db();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $db->view($_POST['id']);
}
