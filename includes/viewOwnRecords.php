<?php
$user = $_SESSION['username'];
if ($stmt = $conn->prepare("SELECT * FROM listings WHERE username = '$user'")) {
  $stmt->execute(); // execute sql statement
  $result = $stmt->get_result(); //returns the results from sql statement

  
  // output data of each row
  while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows

    echo '<a href="product.php?ProductID=' . $row ['ProductID'] . '">';
      echo '<div class= "max-w-sm m-4 p-1 bg-yellow-100 rounded-xl"> ';
    echo '<img src="./' . $row['ProductImage'] . '" class=" max-h-64 h-64 w-64 object-cover	 mx-auto rounded-xl" alt="product image">';
      echo ' <div  class="bg-yellow-100 p-3 rounded-lg text-center"> ';
         echo ' <h1 class="font-bold text-lg	">' . $row ['ProductTitle'] .   '</h1>' . '<h2>Posted By: ' . $row['username'] . '</h2>' .  '<h2> £' . $row['Price'] . '</h2>';
         echo '</div>';
         echo '<div class="flex flex-wrap"><a class="p-4 w-28 mx-auto align-middle rounded-xl bg-green-400 hover:bg-green-300" href="newListing.php">Edit</a><a class="p-4 w-28 mx-auto align-middle rounded-xl bg-green-400 hover:bg-green-300" href="delListing.php?ProductID=' . $row ['ProductID'] . '">Delete</a> </div>';
   echo '</div>';
   echo '</a>';


  }

  $stmt->close(); // close sql statement - optional and depends on context
  $conn->close(); // close dbase connection - optional and depend on context

}
?>