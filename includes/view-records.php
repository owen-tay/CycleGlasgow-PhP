<?php

if ($stmt = $conn->prepare("SELECT * FROM listings")) {
  $stmt->execute(); // execute sql statement
  $result = $stmt->get_result(); //returns the results from sql statement

  
  // output data of each row
  while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows

    echo '<a href="product.php?ProductID=' . $row['ProductID'] . '">';
    echo '<div class="max-w-sm m-4 p-1 border border-1  border-gray-200 hover:border-pink-cycle border-dashed rounded-xl flex justify-center items-center text-left card">';
    
    // Image column
    echo '<div class="w-1/2">';
    echo '<img src="' . $row['ProductImage'] . '" class="h-64 w-48 object-cover rounded-xl" alt="product image">';
    echo '</div>';
    
    echo '<div class="w-1/2 p-3 rounded-lg">';
    echo '<h1 class="font-bold text-lg">' . $row['ProductTitle'] . '</h1>';
    echo '<h2>Posted By: ' . $row['username'] . '</h2>';
    echo '<h2 class= "pt-3"><span class="bg-pink-300 p-2 rounded-md">£' . $row['Price'] . '</span></h2>';
    echo '</div>';
    
    echo '</div>';
    echo '</a>';
    
    
    
  }

  $stmt->close(); // close sql statement - optional and depends on context
  $conn->close(); // close dbase connection - optional and depend on context

}
?>