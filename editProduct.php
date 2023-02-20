<?php



$target_dir = "images/productImages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$get = $_GET["ProductID"];


 //Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  header("location: index.php");
  
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

  

 session_start(); include('includes/error-reporting.php');include('includes/connx.php');include('includes/session-chk.php');
    //this is to check the post method works
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo $_SESSION['username'];
        //vars and setting up statement
        //form inputs variables
        $user = $_SESSION['username'];
        $Product = $_POST['Product'];
        $Brand = $_POST['Brand'];
        $Age = $_POST['Age'];
        $Condition = $_POST['Condition'];
        $Category = $_POST['Category'];
        $Price = $_POST['Price'];
        $Description = $_POST['Description'];
        $Image = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        echo '| ' .  $Product, $Brand, $Age, $Condition, $Category, $Price, $Description, $Image, $user, $get;






        //prepared sql statement with the var $stmt
        //(conn from conx file uses prepare function to insert info into the user details table)
        $stmt = $conn->prepare("UPDATE listings 
        SET ProductTitle =?,
        BrandName = ?,
        ProductAge = ?,
        ProductCondition = ?,
        Category = ?,
        Price = ?,
        ProductDescription = ?,
        ProductImage = ?,
        username = ?


        WHERE ProductID = ?; ");

        //now we "bind" the vars to the statement. This should tell the statment the kind of values to expect
        //eg strings "ss (string string)
        $stmt->bind_param("ssssssssss", $Product, $Brand, $Age, $Condition, $Category, $Price, $Description, $Image, $user, $get);

        //now we run the statement
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location: index.php");

        exit();
        
    }




    ?>
    