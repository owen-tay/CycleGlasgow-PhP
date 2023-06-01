<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');

$date = date('d-m-y H:i:s');
$get = $_GET["ProductID"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
</head>

<body class="bg-white">
    <?php include('includes/navbar.php'); ?>

    <div id="showcase" class="container mx-auto px-4 pt-10">
        <?php
        if (isset($_GET['ProductID'])) {
            if ($stmt = $conn->prepare("SELECT * FROM listings WHERE ProductID = '$get' ")) {
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="flex flex-col items-center bg-white shadow-md rounded-lg p-5 m-2 md:mx-12">';
                    echo '<a href="product.php?ProductTitle=' . $row['ProductTitle'] . '">';
                    echo '<img src="./' . $row['ProductImage'] . '" class="w-80 h-80 object-cover rounded-lg" alt="product image">';
                    echo '</a>';
                    echo '<div class="mt-4 text-center">';
                    echo '<h1 class="text-3xl font-bold text-black mb-2">' . $row['ProductTitle'] . '</h1>';
                    echo '<h2 class="text-lg text-black mb-2">Posted by: ' . $row['username'] . '</h2>';
                    echo '<h2 class="text-lg text-black mb-2">Price: £' . $row['Price'] . '</h2>';
                    echo '<h2 class="text-lg text-black mb-2">Brand: ' . $row['BrandName'] . '</h2>';
                    echo '<h2 class="text-lg text-black mb-2">Condition: ' . $row['ProductCondition'] . '</h2>';
                    echo '<h2 class="text-lg text-black mb-2">Age: ' . $row['ProductAge'] . '</h2>';
                    echo '<p class="text-lg text-black mb-2">' . $row['ProductDescription'] . '</p>';
                    echo '<h2 class="text-lg text-black mb-2">Category: ' . $row['Category'] . '</h2>';
                    echo '</div>';
                    echo '</div>';
                }

                $stmt->close();
                $conn->close();
            }
        }
        ?>

        <div class="flex justify-center mt-8">
            <a href="view-results.php" class="bg-pink-200 hover:bg-pink-400 text-black font-bold py-2 px-4 rounded-lg">Back</a>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
