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
    <?php include('includes/navbar.php'); ?>
    <!--main index-->

    <div class="blogHeader">
  <h1 class="py-7 text-2xl md:text-4xl font-bold text-black flex justify-center">
    Cycle Glasgow Blog!
  </h1>
</div>
<div class="flex flex-wrap justify-center pb-30">
  <div class="blogCard">
    <img
      src="images/central.jpg"
      class="h-40 blogimage"
      alt="Central Station"
    />
    <h2 class="text-sm font-bold">Glagows New Cycle Paths</h2>
    <p class="pt-1 text-xs h-14">
      Learn more about Glagow City Councils new cycle path plans, as well
      as other green transport developments.
    </p>
    <a
      class="text-md text-pink-cycle hover:text-blue-cycle transition ease-in-out"
      href="blog1.php"
    >
      Read More...
    </a>
  </div>
  <div class="blogCard">
    <img
      src="images/dutchbike.jpg"
      class="h-40 blogimage"
      alt="dutch bike"
    />
    <h2 class="text-sm font-bold">Dutch Bikes: Worth the Hype?</h2>
    <p class="pt-1 text-xs h-14">
      The Rise of Dutch Bikes: A Pedal-Powered Revolution Sweeping the UK
    </p>
    <a
      class="text-md text-pink-cycle hover:text-blue-cycle transition ease-in-out"
      href="blog2.php"
    >
      Read More...
    </a>
  </div>
  <div class="blogCard">
    <img
      src="images/bikewall.jpg"
      class="h-40 blogimage"
      alt="Mountain Bike"
    />
    <h2 class="text-sm font-bold">Mountain Biking Near Glasgow</h2>
    <p class="pt-1 text-xs h-14">
      Exploring the Thrills of Mountain Biking in Scotland: A Guide to
      Glasgow's Trails
    </p>
    <a
      class="text-md text-pink-cycle hover:text-blue-cycle transition ease-in-out"
      href="blog3.php"
    >
      Read More...
    </a>
  </div>
  <div class="blogCard">
    <img
      src="images/bikeup.jpg"
      class="h-40 blogimage"
      alt="Central Station"
    />
    <h2 class="text-sm font-bold">Cycling Safely</h2>
    <p class="pt-1 text-xs h-14">
      Navigating UK Roads within Legal Boundaries
    </p>
    <a
      class="text-md text-pink-cycle hover:text-blue-cycle transition ease-in-out"
      href="blog4.png"
    >
      Read More...
    </a>
  </div>
</div>





<?php include('includes/footer.php'); ?>





</body>