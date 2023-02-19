<?php

if ($stmt = $conn->prepare("SELECT * FROM listings")) {
  $stmt->execute(); // execute sql statement
  $result = $stmt->get_result(); //returns the results from sql statement

  
  // output data of each row
  while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows

    echo '<a href="product.php?ProductID=' . $row ['ProductID'] . '">';
   echo '<div id="card" class=" bg-amber-100 p-2 rounded-xl m-5 max-w-s">';
 echo '<img src="./images/productImages/' . $row['ProductImage'] . '"' . ' class=" rounded-lg border-gray-300" alt="product image">';
   echo ' <div id="bottomCard" class="bg-orange-200 rounded-lg text-center"> ';
      echo ' <h1>' . $row ['ProductTitle'] .   '</h1>' . '<h2>Posted By: ' . $row['username'] . '</h2>' .  '<h2> £' . $row['Price'] . '</h2>';
      echo '</div>';
echo '</div>';
echo '</a>';
  }

  $stmt->close(); // close sql statement - optional and depends on context
  $conn->close(); // close dbase connection - optional and depend on context

}
?>