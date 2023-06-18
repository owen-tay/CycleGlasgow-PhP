<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$date = date('d-m-y H:i:s');
$get = $_GET["ProductID"]


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>
<?php include('includes/navbar.php'); ?>



 




    <div id="showcase" class="container mx-auto flex flex-wrap"> <?php
            if (isset($_GET['ProductID'])) {
                // id index exists
            
                if ($stmt = $conn->prepare("SELECT * FROM listings WHERE ProductID = '$get' ")) {
                    $stmt->execute(); // execute sql statement
                    $result = $stmt->get_result(); //returns the results from sql statement
            
        
                    // output data of each row
                    while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows
            
                        echo '<div class= "container text-center mx-auto text-lg mb-5">';
                        echo '<h1 class="m-5 text-4xl font-bold text-center"> Are you sure you want to Delete ' .  $row['ProductTitle'] . '? </h1>';
                        echo '<a href="deleteScript.php?ProductID=' . $get . '">' . '<button class="bg-pink-400 hover:bg-pink-200 text-white font-bold py-2 px-4 rounded-full">
                            Yes
                          </button>
                          <a href="adminHome.php">
                        <button class="bg-blue-400 hover:bg-blue-200 text-white font-bold py-2 px-4 rounded-full  ">
                            No
                          </button>';
                        echo '</div>';
        
        
        
                    }
        
                    $stmt->close(); // close sql statement - optional and depends on context
                    $conn->close(); // close dbase connection - optional and depend on context
            
                }
            }
            else {
                header('location:adminHome.php');

            }
    ?> </div>
</div>

   





    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>