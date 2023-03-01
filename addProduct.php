<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$target_dir = "images/productimages";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$file_size = $_FILES["uploaded-image"]["size"];




//this is to check the post method works
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {

    exit("Only JPG, JPEG, PNG & GIF files are allowed.");
  }

  if ( $file_size > 50000) {
    exit ("The file exceeds 50Kb. Please upload a smaller filesize.");
  }




  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    echo "File uploaded successfully.";

  }
  // comments go here - fully document this conditional statement
  else {

    exit("There was an error uploading your file.");
  }




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





  //prepared sql statement with the var $stmt
  //(conn from conx file uses prepare function to insert info into the user details table)
  $stmt = $conn->prepare("INSERT INTO listings (ProductTitle, BrandName, ProductAge, ProductCondition, Category, Price, ProductDescription, ProductImage, username) VALUES (?,?,?,?,?, ?,?,?,?)");

  //now we "bind" the vars to the statement. This should tell the statment the kind of values to expect
  //eg strings "ss (string string)
  $stmt->bind_param("sssssssss", $Product, $Brand, $Age, $Condition, $Category, $Price, $Description, $Image, $user);

  //now we run the statement
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //header('location: index.php');

  //then we navigate to login.php and close this script!
  header("location: index.php");
  exit();

}




?>