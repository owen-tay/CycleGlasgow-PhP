<?php 
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$date = date('d-m-y H:i:s');
$get = $_GET["ProductID"];
$user = $_SESSION['username'];

if (isset($_GET['ProductID'])) {
    $stmt = $conn->prepare("DELETE FROM listings WHERE ProductID = ? AND (username = ? OR 'admin' = ?)");
    $stmt->bind_param("sss", $get, $user, $user);

    if ($stmt->execute()) {
        header('location: adminHome.php');
        $stmt->close();
        $conn->close();
    } else {
        echo "you did not list this, Please Return";
    }
} else {

}
?>
