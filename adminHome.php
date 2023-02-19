<?php session_start(); include('includes/error-reporting.php');include('includes/connx.php');include('includes/session-chk.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>

</head>


<body>





    <div class="container mx-auto bg-orange-200">
        <h2>Admin Home</h2>
        
        <p> You are logged in as: <?php echo $_SESSION['username']. " on ". $date; ?> </p>
<a href = "logout.php">Log out </a>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>

