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
    <?php include('includes/navbar.php'); ?>


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



    <div class="flex justify-center items-center flex-wrap gap-14 content-evenly py-10 md:flex">
        <div class="grid grid-row sm:grid-rows-1 max-w-xl pt-6">
            <img src="images/upbike.svg" class="row-start-1 imagefix" alt="Logo" />
            <div class="row-end-2">
                <h1 class="text-3xl font-bold">Cycling in Glasgow is Up!</h1>
                <p1 class="text-lg pt-2">
                    In the last 12 years, Glasgow council has reported a 165% increase
                    of cycling within the city centre.
                </p1>
            </div>
        </div>
        <div class="grid grid-row sm:grid-rows-1 max-w-xl py-6">
            <img src="images/map.svg" class="row-start-1 imagefix " alt="Logo" />
            <div class="row-end-2 ">
                <h1 class="text-3xl font-bold">Glasgow Cycle Paths</h1>
                <p1 class="text-lg pt-2">
                    With new cycle paths all over Glasgow, there has never been a
                    better time to pick up cycling.
                </p1>
                <div class="flex justify-center items-center">
                    <a href="map.php" class="pt-5">
                        <div
                            class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-48 h-9  text-white rounded-2xl line text-center pt-1 drop-shadow-lg hoverSize text-lg transition ease-in-out">
                            Cycle Path Map
                        </div>

                    </a>
                </div>
            </div>
        </div>
        </main>
        <div class="blogJumbo h-96 md:h-80 w-full drop-shadow-2xl">
            <div class=" h-96 md:h-80 w-full bg-gray-700 bg-opacity-60">
                <div class="text-center mx-10 md:mx-50">
                    <h2 class="py-7 text-2xl md:text-4xl font-bold text-white">
                        Read Our Blog
                    </h2>
                    <p class="text-xl md:text-2xl text-white">
                        Pedal through the wonders of Glasgow with our informative blog,
                        unveiling the hidden gems and cycling routes that make this city a
                        two-wheeler's paradise.
                    </p>
                    <div class="flex justify-center items-center">

                        <a href="blog.php" class="pt-20">
                            <div
                                class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-48 h-9  text-white rounded-2xl line text-center pt-1 drop-shadow-lg hoverSize text-lg transition ease-in-out">
                                Read our blog!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Searchbar -->


    <div class="flex flex-row items-center justify-center mt-5">
  <div>
    <h1 class="p-5 text-md md:text-md font-bold text-black text-center">
      Search for products on sale by the community here!
    </h1>
  </div>
  <div class="relative">
    <form action="view-results.php" method="get">
      <div class="flex">
        <input type="text" name="Search" class="py-2 pr-4 pl-10 border-2 rounded-l focus:outline-none   focus:border-transparent"
          minlength="2" placeholder="Search..." autocomplete="off">
        <button type="submit" class="flex items-center px-4 border-2 rounded-l bg-white focus:outline-none focus:ring-2 focus:border-transparent">
          <svg class="w-6 h-6 text-black" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
          </svg>
        </button>
      </div>
    </form>
  </div>
</div>






    <!-- Searchbar end -->





    <?php include('includes/footer.php'); ?>













</body>