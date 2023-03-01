<?php
$get = $_GET["Category"];
$search = $_GET["Search"];



include('includes/connx.php');
include('includes/session-chk-homepage.php');
include('includes/error-reporting.php');


$date = date('d-m-y H:i:s');

// add search to database 
if(isset($_GET['Search'])) {

    
    //prepared sql statement with the var $stmt
    //(conn from conx file uses prepare function to insert info into the search table)
    $stmt = $conn->prepare("INSERT INTO searchresults (SearchTerm) VALUES (?)");
  
    //now we "bind" the vars to the statement. This should tell the statment the kind of values to expect
    //eg strings "ss (string string)
    $stmt->bind_param("s", $search);

  
    //now we run the statement
    $stmt->execute();
    $stmt->close();
    //header('location: index.php');
  
    //then we navigate to login.php and close this script!
  
  }


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>

<nav class=" bg-ereviveGreen border-gray-200 px-2 sm:px-4 py-2.5">
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
                class="flex flex-col p-4 mt-4   rounded-lg bg-ereviveGreen md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md: md:bg-ereviveGreen  md: ">
                <li>
                    <a href="index.php"
                        class="block py-2 pl-3 pr-4 text-white bg-ereviveGreen rounded md:bg-transparent md: md:p-0 md: "
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
    <div class=" bg-ereviveGreen2 h-2	">


    </div>

    

    <div class="absolute screenwide" >
    <div class="flex flex-wrap items-center justify-center mt-2 md:flex-wrap">
        <div class="text-center"> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Camera'">
                <img src="images/camera.jpg" class="object-contain rounded-full h-16 hover:h-20 ease-in-out duration-300 ">
            </a>
        </div>
        Cameras
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Phone'">
                <img src="images/phone.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20 ">
            </a>
        </div>
        Phones
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Transport'">
                <img src="images/Transport.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20 ">
            </a>
        </div>
        Transport
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Computer'">
                <img src="images/Computer.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
            </a>
        </div>
        Computers
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='TV's'">
                <img src="images/TV.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
            </a>
        </div>
        TV's
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Gaming'">
                <img src="images/gaming.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20 ">
            </a>
        </div>
        Gaming
    </div>
    <div class="text-center "> 
        <div class="rounded-full m-4 border-ereviveGreen border-2">
            <a href="view-results.php?Category='Music'">
                <img src="images/music.jpg" class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20 ">
            </a>
        </div>
        Music
    </div>

    </div>
</div>
    <div class="mt-14">
    <h1 class="text-center text-4xl mt-96 md:mt-40 relative xsleet:mt-40"> Check Out The lastest Listings!</h1>
</div>


    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">
        <?php 



    //here we can do some funky stuff with includes

    if(($_GET['Search'])) {
      $get = "jdajsd";
      if ($stmt = $conn->prepare("SELECT * FROM listings
      WHERE BrandName LIKE '%$search%'
      OR ProductDescription LIKE '%$search%'
      OR ProductTitle Like '%$search%';
      ")) {
        $stmt->execute(); // execute sql statement
        $result = $stmt->get_result(); //returns the results from sql statement
      
        
        // output data of each row
        while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows
      
          echo '<a href="product.php?ProductID=' . $row ['ProductID'] . '">';
         echo '<div class= "max-w-sm m-4 p-1 bg-yellow-100 rounded-xl"> ';
       echo '<img src="' . $row['ProductImage'] . '" class=" max-h-64 h-64 w-64 object-cover	 mx-auto rounded-xl" alt="product image">';
         echo ' <div  class="bg-yellow-100 p-3 rounded-lg text-center"> ';
            echo ' <h1 class="font-bold text-lg	">' . $row ['ProductTitle'] .   '</h1>' . '<h2>Posted By: ' . $row['username'] . '</h2>' .  '<h2> £' . $row['Price'] . '</h2>';
            echo '</div>';
      echo '</div>';
      echo '</a>';
        }
      
        $stmt->close(); // close sql statement - optional and depends on context
        $conn->close(); // close dbase connection - optional and depend on context
      
      }

    }
    else {
      $search = "assfd";
    
if ($stmt = $conn->prepare("SELECT * FROM listings WHERE Category = $get")) {
  $stmt->execute(); // execute sql statement
  $result = $stmt->get_result(); //returns the results from sql statement

  
  // output data of each row
  while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows

    echo '<a href="product.php?ProductID=' . $row ['ProductID'] . '">';
   echo '<div class= "max-w-sm m-4 p-1 bg-yellow-100 rounded-xl"> ';
 echo '<img src="' . $row['ProductImage'] . '" class=" max-h-64 h-64 w-64 object-cover	 mx-auto rounded-xl" alt="product image">';
   echo ' <div  class="bg-yellow-100 p-3 rounded-lg text-center"> ';
      echo ' <h1 class="font-bold text-lg	">' . $row ['ProductTitle'] .   '</h1>' . '<h2>Posted By: ' . $row['username'] . '</h2>' .  '<h2> £' . $row['Price'] . '</h2>';
      echo '</div>';
echo '</div>';
echo '</a>';
  }

  $stmt->close(); // close sql statement - optional and depends on context
  $conn->close(); // close dbase connection - optional and depend on context

}
    }
?>

    

    </div>







