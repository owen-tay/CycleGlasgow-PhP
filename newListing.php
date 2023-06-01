<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$get = $_GET["ProductID"];
$date = date('d-m-y H:i:s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>
    <?php include('includes/navbar.php'); ?>

    <div class="container bg-white mx-auto justify-center max-w-md p-5 rounded-lg mt-8">
        <h2 class="mb-8 text-xl text-center">Edit Listing</h2>
        <form method="post" enctype="multipart/form-data" name="login_form"
            action="editProduct.php?ProductID=<?php echo $get; ?>">
            <div class="form-outline mb-4">
                <input type="text" minlength="30" maxlength="20" id="Product" name="Product" class="form-control"
                    value="<?php echo $row['ProductTitle']; ?>" required>
                <label class="form-label" for="Product">Product Title</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" minlength="2" maxlength="20" value="<?php echo $row['BrandName']; ?>" id="Brand"
                    name="Brand" class="form-control" required>
                <label class="form-label" for="Brand">Brand Name</label>
            </div>
            <label class="form-label" for="Age">Product Age</label>
            <div class="form-outline mb-4">
                <select id="Age" name="Age" class="form-control" required>
                    <option value="1 Year">1 Year</option>
                    <option value="2 Years">2 Year</option>
                    <option value="3 Years">3 Year</option>
                    <option value="4 Years">4 Year</option>
                    <option value="5+ Years">5 Year</option>
                    <option selected value="<?php echo $row['ProductAge']; ?>"><?php echo $row['ProductAge']; ?>
                    </option>
                </select>
            </div>
            <label class="form-label" for="Condition">Condition</label>
            <div class="form-outline mb-4">
                <select id="Condition" name="Condition" class="form-control" required>
                    <option value="Poor">Poor</option>
                    <option value="Good">Good</option>
                    <option value="New">New</option>
                    <option selected value="<?php echo $row['ProductCondition']; ?>"><?php echo $row['ProductCondition']; ?></option>
                </select>
            </div>
            <label class="form-label" for="Category">Category</label>
            <div class="form-outline mb-4">
                <select id="Category" name="Category" class="form-control rounded border-gray-300 py-2 px-3 w-full"
                    required>
                    <option value="Bike">Bike</option>
                    <option value="Electric Bike">Electric Bike</option>
                    <option value="Helmet">Helmet</option>
                    <option value="Sunglasses">Sunglasses</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Tools">Tools</option>
                    <option value="Clothes">Clothes</option>
                    <option selected value="<?= $row['Category'] ?>"><?= $row['Category'] ?></option>
                </select>

            </div>
            <div class="form-outline mb-4">
                <input type="number" step="any" value="<?php echo $row['Price']; ?>" id="Price" name="Price"
                    class="form-control" required>
                <label class="form-label" for="Price">Price in £</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" minlength="2" maxlength="300" value="<?php echo $row['ProductDescription']; ?>"
                    id="Description" name="Description" class="form-control" required>
                <label class="form-label" for="Description">Description</label>
            </div>
            <form action="/includes/editProduct.php?ProductID=<?php echo $get; ?>" method="post"
                enctype="multipart/form-data">
                Select image to upload:
                <input type="file" required name="fileToUpload" id="fileToUpload required">
                <input type="submit" value="Upload" class="p-2 pl-6 pr-6 rounded-xl bg-orange-300 hover:bg-orange-200"
                    name="submit">
            </form>
            <a class="p-2 rounded-xl bg-green-400 hover:bg-green-300" href="adminHome.php">Back</a>
        </form>
    </div>

    <?php include('includes/navbar.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>