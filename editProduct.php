<?php
session_start();

$target_dir = "images/productimages";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$file_size = $_FILES["uploaded-image"]["size"];

$get = $_GET["ProductID"];
$user = $_SESSION['username'];

include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    exit("Only JPG, JPEG, PNG & GIF files are allowed.");
  }

  if ($file_size > 50000) {
    exit("The file exceeds 50Kb. Please upload a smaller filesize.");
  }

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "File uploaded successfully.";
  }
  else {
    exit("There was an error uploading your file.");
  }

  echo $_SESSION['username'];

  $user = $_SESSION['username'];
  $Product = $_POST['Product'];
  $Brand = $_POST['Brand'];
  $Age = $_POST['Age'];
  $Condition = $_POST['Condition'];
  $Category = $_POST['Category'];
  $Price = $_POST['Price'];
  $Description = $_POST['Description'];
  $Image = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  echo '| ' . $Product, $Brand, $Age, $Condition, $Category, $Price, $Description, $Image, $user, $get;

  $stmt = $conn->prepare("UPDATE listings 
  SET ProductTitle = ?,
  BrandName = ?,
  ProductAge = ?,
  ProductCondition = ?,
  Category = ?,
  Price = ?,
  ProductDescription = ?,
  ProductImage = ?
  WHERE ProductID = ? 
  AND (username = ? OR 'admin' = ?)");

$stmt->bind_param("sssssssssss", $Product, $Brand, $Age, $Condition, $Category, $Price, $Description, $Image, $get, $user, $user);


  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("location: index.php");

  exit();

}

?>
