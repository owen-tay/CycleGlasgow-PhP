<?php

if(!isset($_SESSION['username'])){

    header('location: login-start.php?logged=denied');
    exit();

}


?>