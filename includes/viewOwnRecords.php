<?php






$user = $_SESSION['username'];
$admin = $_SESSION['isAdmin'];

if ($admin == "Yes") {
  if ($stmt = $conn->prepare("SELECT * FROM listings")) {
    $stmt->execute(); // execute sql statement
    $result = $stmt->get_result(); //returns the results from sql statement

  
  
    // output data of each row
    while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows
      echo '<a href="product.php?ProductID=' . $row['ProductID'] . '">';
      echo '<div class= "max-w-sm m-4 p-1 bg-pink-100 rounded-xl"> ';
      echo '<img src="' . $row['ProductImage'] . '" class=" max-h-64 h-64 w-64 object-cover	 mx-auto rounded-xl" alt="product image">';
      echo ' <div  class="bg-pink-100 p-3 rounded-lg text-center"> ';
      echo ' <h1 class="font-bold text-lg	">' . $row['ProductTitle'] . '</h1>' . '<h2>Posted By: ' . $row['username'] . '</h2>' . '<h2> £' . $row['Price'] . '</h2>';
      echo '</div>';
      echo '<div class="flex flex-wrap mx-auto justify-center mb-3">
        <a href="editListing.php?ProductID=' . $row['ProductID'] . '">
          <button class="bg-pink-500 hover:bg-pink-300 text-white font-bold py-2 px-4 rounded-full  ">
               Edit 
            </button>
           </a>
           <a href="delListing.php?ProductID=' . $row['ProductID'] . '">
           <button class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-full">
            Delete
            </button></a>       
           </div>';
      echo '</div>';
      echo '</a>';
  
  
    }
  
    $stmt->close(); // close sql statement - optional and depends on context
    $conn->close(); // close dbase connection - optional and depend on context
  
  }

}
else {


if ($stmt = $conn->prepare("SELECT * FROM listings WHERE username = '$user'")) {
  $stmt->execute(); // execute sql statement
  $result = $stmt->get_result(); //returns the results from sql statement


  // output data of each row
  while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows

    echo '<a href="product.php?ProductID=' . $row['ProductID'] . '">';
echo '<div class="max-w-sm m-4 p-1 border border-1  border-gray-200 hover:border-pink-cycle border-dashed rounded-xl flex justify-center items-center text-left card">';

// Image column
echo '<div class="w-2/2">';
echo '<img src="' . $row['ProductImage'] . '" class="h-64 w-48 object-cover rounded-xl" alt="product image">';
echo '</div>';

echo '<div class="w-1/2 p-4 rounded-lg">';
echo '<h1 class="font-bold text-lg">' . $row['ProductTitle'] . '</h1>';
echo '<h2>Posted By: ' . $row['username'] . '</h2>';

// Buttons
echo '<div class="flex flex-wrap-reverse justify-start  ">';
echo '<a href="editListing.php?ProductID=' . $row['ProductID'] . '">';
echo '<button class=" m-3" > <span class="bg-pink-200 p-3  rounded-md">CHANGE</span></button>';
echo '</a>';
echo '<a href="delListing.php?ProductID=' . $row['ProductID'] . '">';
echo '<button class=" m-3" ><span class="bg-pink-200 p-3 rounded-md">DELETE</span></button>';
echo '</a>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</a>';

    


  }

  $stmt->close(); // close sql statement - optional and depends on context
  $conn->close(); // close dbase connection - optional and depend on context

}
}
?>