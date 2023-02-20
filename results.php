<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>

    <nav class="bg-green-400 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="images/Logo.svg" class="h-8 mr-3 sm:h-9" alt="eRevive" />

            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200   "
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                class="flex flex-col p-4 mt-4   rounded-lg bg-green-400 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md: md:bg-green-400  md: ">
                <li>
                    <a href="index.php"
                        class="block py-2 pl-3 pr-4 text-white bg-green-300 rounded md:bg-transparent md:text-yellow-300 md:p-0 md: "
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="<?php if (!isset($_SESSION['username'])) {
                        echo " login-start.php";
                    } else {
                        echo "adminHome.php";
                    } ?>" class="block py-2 pl-3 pr-4
                        text-white rounded hover:bg-green-300 md:hover:bg-transparent md:border-0
                        md:hover:bg-green-300 md:p-0 ">
                        <?php if (!isset($_SESSION['username'])) {
                            echo "Login";
                        } else {
                            echo "Account";

                        }
                        ?>




                    </a>
                </li>
                <li>
                    <a href="<?php if (!isset($_SESSION['username'])) {
                        echo " login-start.php";
                    } else {
                        echo "adminHome.php";
                    } ?>" class="block py-2 pl-3 pr-4
                        text-white rounded hover:bg-green-300 md:hover:bg-transparent md:border-0
                        md:hover:bg-green-300 md:p-0 ">
                        <?php if (!isset($_SESSION['username'])) {

                        } else {

                            echo '<a class="text-white" href="logout.php">Log out </a>';

                        }
                        ?>




                    </a>
                </li>


            </ul>
            </div>
        </div>

    </nav>
    <div class="bg-green-300 h-2 rounded-b-xl	">


    </div>


    <div class="flex items-center justify-center mt-5">
        <div class="flex border-2 rounded">
            <input type="text" class="px-4 py-2 w-40 md:w-80 " placeholder="Search...">
            <button class="flex items-center justify-center px-4 border-l">
                <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24">
                    <path
                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="m-5">
    <h1 class="text-center text-4xl"> Check Out The lastest Listings!</h1>
</div>




    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">
        <?php 
    //here we can do some funky stuff with "while"
    include('includes/view-results.php');

    ?>

    </div>
















    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>