<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');
$admin = $_SESSION['isAdmin'];


$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>


<body>
    <?php include('includes/navbar.php'); ?>




    <div class=" mx-auto">
        <?php
        if ($admin == "Yes") {
            echo "<h2 class='text-center text-green-400 bg-yellow-100'> Admin Mode</h1>";
        }


        ?>

<h3 class="text-center m-4 text-xl"> Hello
    <?php echo $_SESSION['username'] . '!' ?>
    
    <h2 class="text-4xl text-center mt-4">Your Posts</h2>




    </div>
    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">
        <a href="newListing.php" class="pt-5">
            <div
                class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-48 h-9  text-white rounded-2xl line text-center pt-1 drop-shadow-lg hoverSize text-lg transition ease-in-out">
                New Post </div>

        </a>
    </div>
    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">
        <?php
        //here we can do some funky stuff with "while"
        include('includes/viewOwnRecords.php');

        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>