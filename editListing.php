<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$get = $_GET["ProductID"];
$date = date('d-m-y H:i:s');
$admin = $_SESSION['isAdmin'];


if (isset($_GET['ProductID'])) {
    if ($stmt = $conn->prepare("SELECT * FROM listings WHERE ProductID = ?")) {
        $stmt->bind_param("s", $get);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php include('modules/head.php'); ?>
            </head>

            <body class="bg-gradient-to-r from-blue-cycle to-pink-cycle">
                <?php include('includes/navbar.php'); ?>

                <div class="container bg-white mx-auto justify-center max-w-md p-5 rounded-lg mt-8">
                    <h2 class="mb-8 text-xl text-center">Edit Listing</h2>
                    <form method="post" enctype="multipart/form-data" name="login_form"
                        action="editProduct.php?ProductID=<?= $get ?>">
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="Product">Product Title</label>
                            <input type="text" minlength="5" maxlength="30" id="Product" name="Product"
                                class="form-control rounded border-gray-300 py-2 px-3 w-full" value="<?= $row['ProductTitle'] ?>"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="Brand">Brand Name</label>
                            <input type="text" minlength="2" maxlength="20" id="Brand" name="Brand"
                                class="form-control rounded border-gray-300 py-2 px-3 w-full" value="<?= $row['BrandName'] ?>"
                                required>
                        </div>
                        <label class="form-label" for="Age">Product Age</label>
                        <div class="mb-4">
                            <select id="Age" name="Age" class="form-control rounded border-gray-300 py-2 px-3 w-full" required>
                                <option value="1 Year">1 Year</option>
                                <option value="2 Years">2 Year</option>
                                <option value="3 Years">3 Year</option>
                                <option value="4 Years">4 Year</option>
                                <option value="5+ Years">5 Year</option>
                                <option selected value="<?= $row['ProductAge'] ?>"><?= $row['ProductAge'] ?></option>
                            </select>
                        </div>
                        <label class="form-label" for="Condition">Condition</label>
                        <div class="mb-4">
                            <select id="Condition" name="Condition" class="form-control rounded border-gray-300 py-2 px-3 w-full"
                                required>
                                <option value="Poor">Poor</option>
                                <option value="Good">Good</option>
                                <option value="New">New</option>
                                <option selected value="<?= $row['ProductCondition'] ?>"><?= $row['ProductCondition'] ?></option>
                            </select>
                        </div>
                        <label class="form-label" for="Category">Category</label>
                        <div class="mb-4">
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
                        <div class="mb-4">
                            <label class="form-label" for="Price">Price in £</label>
                            <input type="number" step="any" id="Price" name="Price"
                                class="form-control rounded border-gray-300 py-2 px-3 w-full" value="<?= $row['Price'] ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="Description">Description</label>
                            <input type="text" minlength="2" maxlength="300" id="Description" name="Description"
                                class="form-control rounded border-gray-300 py-2 px-3 w-full"
                                value="<?= $row['ProductDescription'] ?>" required>
                        </div>
                        <form action="/includes/editProduct.php?ProductID=<?= $get ?>" method="post" enctype="multipart/form-data">
                            <label class="form-label" for="fileToUpload"> Select image to upload:
                            </label>

                            <input type="file" required name="fileToUpload" id="fileToUpload"
                                class="form-control rounded border-gray-300 py-2 px-3">
                            <input type="submit" value="Upload" class="p-2 px-4 pl-6 pr-6 rounded-xl bg-pink-300 hover:bg-pink-200"
                                name="submit">
                        </form>
                        <a class="p-2 px-4 pl-6 pr-6 rounded-xl bg-pink-300 hover:bg-pink-200" href="adminHome.php">Back</a>
                    </form>
                </div>

                <?php include('includes/footer.php'); ?>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
            </body>

            </html>
            <?php
        }
        $stmt->close();
    }
}
$conn->close();
?>