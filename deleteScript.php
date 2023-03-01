<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$date = date('d-m-y H:i:s');
$get = $_GET["ProductID"];
$user = $_SESSION['username'];



    ?>


<?php
if (isset($_GET['ProductID'])) {



    // id index exists
    if ($stmt = $conn->prepare("DELETE FROM listings WHERE ProductID = $get AND username = '$user' OR 'admin'")) {
        $stmt->execute(); // execute sql statement
        $result = $stmt->get_result(); //returns the results from sql statement

        }
        echo "you did not list this, Please Return";

        $stmt->close(); // close sql statement - optional and depends on context
        $conn->close(); // close dbase connection - optional and depend on context
        echo'sdfgsdfgsdfg';
        header('location: adminHome.php');

    }
 else {
    echo'sdfgsdfgsdfg';

}
?>
