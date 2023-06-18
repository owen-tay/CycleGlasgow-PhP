<?php
 session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');
$getCategory = isset($_GET["Category"]) ? $_GET["Category"] : "";
$getSearch = isset($_GET["Search"]) ? $_GET["Search"] : "";



$date = date('d-m-y H:i:s');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
</head>

<body>
    <?php include('includes/navbar.php'); ?>
    <div class="blogHeader blog2 h-56 md:h-80 w-full drop-shadow-2xl">
        <div class=" h-56 md:h-80 w-full bg-gray-700 bg-opacity-60">
          <div class="text-center flex justify-center">
            <h2 class="pt-20 text-2xl md:text-4xl font-bold text-white">
            Seller Listings
            </h2>
          </div>
        </div>
      </div>

    <div class=" absolute mb-12 md: w-full catabreak">
    <div class="flex justify-center relative ">
        <div class="flex flex-wrap items-center justify-center mt-2 md:flex-wrap">
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Bike'); ?>">
                        <img src="images/bike.jpg" alt="bike"
                            class="object-contain rounded-full h-16 hover:h-20 ease-in-out duration-300">
                            Bike
                    </a>
                </div>
                
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Electric Bike'); ?>">
                        <img src="images/electric-bike.jpg" alt="Ebike"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Electric Bike

                    </a>
                </div>
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Helmet'); ?>">
                        <img src="images/helmet.jpg" alt="Helmet"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Helmet
                    </a>
                </div>
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Sunglasses'); ?>">
                        <img src="images/sunglasses.jpg" alt="Sunglasses"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Sunglasses
                    </a>
                </div>
                
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Accessories'); ?>">
                        <img src="images/accessories.jpg" alt="Accessories"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Accessories
                    </a>
                </div>
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 px-4 border-ereviveGreen  border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Tools'); ?>">
                        <img src="images/tools.jpg" alt="Tools"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Tools 

                    </a>
                </div>
            </div>
            <div class="text-center">
                <div class="rounded-full m-2 p-2 border-ereviveGreen border-2">
                    <a href="view-results.php?Category=<?php echo urlencode('Clothes'); ?>">
                        <img src="images/clothes.jpg" alt="Clothes"
                            class="object-contain rounded-full h-16 ease-in-out duration-300 hover:h-20">
                            Clothes
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    </div>


    <div class="mt-14">
        <h1 class="text-center text-4xl mt-40 md:mt-30 relative">Check Out The latest Listings!</h1>
    </div>

    <div id="showcase" class="flex flex-wrap mx-auto justify-center">
        <?php
        if (!empty($getSearch)) {
            $stmt = $conn->prepare("SELECT * FROM listings
                WHERE BrandName LIKE ?
                OR ProductDescription LIKE ?
                OR ProductTitle LIKE ?");
            $searchParam = '%' . $getSearch . '%';
            $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
        } else if (!empty($getCategory)) {
            $stmt = $conn->prepare("SELECT * FROM listings WHERE Category = ?");
            $stmt->bind_param("s", $getCategory);
        } else {
            $stmt = $conn->prepare("SELECT * FROM listings");
        }

        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<a href="product.php?ProductID=' . $row['ProductID'] . '">';
            echo '<div class="max-w-sm m-4 p-1 border border-1 border-gray-200 hover:border-pink-cycle border-dashed rounded-xl flex justify-center items-center text-left card">';
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

        $stmt->close();
        $conn->close();
        ?>
    </div>

    <?php include('includes/footer.php'); ?>
</body>

</html>