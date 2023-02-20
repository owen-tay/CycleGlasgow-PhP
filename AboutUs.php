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

    <!-- Jumbotron -->
    <div class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover rounded-lg " style="
    background-image: url('images/ewaste.jpg');
    height: 55vh;
  ">
        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
            style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex justify-center mt-0 h-full md:mt-20  ">
                <div class="text-white">
                    <h4 class="font-semibold text-4xl mb-6 mt-0 md:mt-10">Join the Fight Against E-Waste: Empowering a Sustainable Future with <span class="text-yellow-300">eRevive</span>.</h4>
                    <p1 class="text-white text-sm ml-16 md:text-xl">Our mission is to create a sustainable future by ending the destructive cycle of e-waste. We believe that technology should serve humanity without harming the planet, and we are committed to helping individuals and organizations responsibly dispose of their electronic devices. Through innovative solutions and education, we aim to reduce the environmental impact of e-waste and build a cleaner, healthier world for future generations.</p1>


</h4>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
    <
    <div class="m-5">
</div>




    <div id="showcase" class=" flex flex-wrap mx-auto justify-center">


    </div>











    <?php /*
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM listings";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["ProductTitle"] ;
            echo $row["ProductAge"] ;

        }
      } else {
        echo "0 results";
      }
      $conn->close();
      */
    
    ?>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>