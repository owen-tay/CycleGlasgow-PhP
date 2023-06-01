<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Header -->
    <?php include('modules/head.php'); ?>
</head>

<body>
    <!--Nav -->
    <nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center font-bold text-md">
                <img src="images/Logo.svg" class="h-8 mr-3 sm:h-9" alt="eRevive" />
                <p class="hover:text-pink-cycle">CycleGlasgow </p>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-pink-cycle focus:outline-none focus:ring-2 focus:ring-gray-200"
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
                    class="flex flex-col p-4 mt-4 rounded-lg bg-ereviveGreen md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle" href="blog.php"
                            class="block py-2 pl-3 pr-4 text-black md:p-0">Blog</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle" href="map.php"
                            class="block py-2 pl-3 pr-4 text-black md:p-0">Map</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle" href="view-results.php"
                            class="block py-2 pl-3 pr-4 text-black md:p-0">Listings</a>
                    </li>
                    <li>
                        <a class="hover:text-pink-cycle" href="<?php if (!isset($_SESSION['username'])) {
                            echo 'login-start.php';
                        } else {
                            echo 'adminHome.php';
                        } ?>"
                            class="block py-2 pl-3 pr-4 text-black rounded hover:text-pink-cycle md:hover:bg-transparent md:border-0 md:p-0">
                            <?php if (!isset($_SESSION['username'])) {
                                echo 'Login';
                            } else {
                                echo 'Account';
                            } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if (!isset($_SESSION['username'])) {
                            echo 'login-start.php';
                        } else {
                            echo 'adminHome.php';
                        } ?>"
                            class="block py-2 pl-3 pr-4 text-black rounded hover:text-pink-cycle md:hover:border-0  md:p-0">
                            <?php if (!isset($_SESSION['username'])) {
                            } else {
                                echo '<a class="text-black" href="logout.php">Log out</a>';
                            } ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--main index-->

    <div class="header mt-2 w-auto mx-3 my-1  grid  sm:grid-flow-col">
        <div class="pt-11  col-span-w-2 sm:pt-24 ps-4 col-span-5">
            <p class="text-2xl  font-bold leading-7 text-center	sm:text-left  sm:text-4xl text-white">
                Fitness
            </p>
            <p class="text-2xl  font-bold leading-7 text-center	sm:text-left  sm:text-4xl text-white">
                Commuting
            </p>
            <p class="text-2xl  font-bold leading-7 text-center	sm:text-left  sm:text-4xl text-white">
                Leisure
            </p>
            <p class="text-2xl  font-bold leading-7 text-center	sm:text-left  sm:text-4xl text-white">
                Glasgow
            </p>
        </div>

        <div class="HeaderImgDiv col-span-1 hidden  sm:inline ">
            <div class="text-1xl pt-0 sm:pt-72 text-start col-span-1 text-white font-bold">
                A project to help educate and grow cycling within Glasgow
            </div>
        </div>
    </div>

    <!--Searchbar-->
    <div>
        <h1 class="p-5 text-md md:text-md font-bold text-black text-center">
            Search for products on sale by the community here!
        </h1>
    </div>

    <div class="flex items-center justify-center mt-5">

        <div class="flex border-2 rounded">
            <form action="view-results.php" method="get">
                <input type="text" name="Search" class="px-5 py-2 w-40 md:w-80 " minlength="2" placeholder="Search...">
                <button type="submit" flex items-center justify-center px-4 border-l">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <!--Searchbar end-->
    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">
        <?php 
    //here we can do some funky stuff with includes
    include('includes/view-records.php');

    ?>





    <?php include('includes/footer.php'); ?>













</body>