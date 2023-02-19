<?php

$url = $_SERVER['REQUEST_URI'];


if(!isset($_SESSION['username'])){

    header('location: login-start.php?logged=denied');
    exit();

}



?>