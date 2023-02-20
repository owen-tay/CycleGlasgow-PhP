<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$date = date('d-m-y H:i:s');
echo $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>



    <nav class="bg-green-400 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="images/Logo.svg" class="h-8 mr-3 sm:h-9" alt="eRevive" />

            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200   "
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4   rounded-lg bg-green-400 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md: md:bg-green-400  md: ">
                    <li>
                        <a href="index.php"
                            class="block py-2 pl-3 pr-4 text-white bg-green-300 rounded md:bg-transparent md:text-yellow-300 md:p-0 md: "
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="<?php if (!isset($_SESSION['username'])) {
                            echo " login-start.php";
                        } else {
                            echo "adminHome.php";
                        } ?>" class="block py-2 pl-3 pr-4
                            text-white rounded hover:bg-green-300 md:hover:bg-transparent md:border-0
                            md:hover:bg-green-300 md:p-0 ">
                            <?php if (!isset($_SESSION['username'])) {
                                echo "Login";
                            } else {
                                echo "Account";
                            }
                            ?>




                        </a>
                    </li>


                </ul>
            </div>
        </div>

    </nav>
    <div class="bg-green-300 h-2 rounded-b-xl">

    </div>




    <div class="container bg-orange-100 mx-auto justify-center max-w-md p-5 rounded-lg mt-8">
        <h2 class="mb-8 text-xl text-center">New Listing </h2>
        <form method="post" enctype="multipart/form-data" name="login_form" action="addProduct.php">
            <!--Convert some characters to HTML entities and strips HTML and PHP tags from a string -->
            <!-- title input -->
            <div class="form-outline mb-4">
                <input type="text" id="Product" name="Product" class="form-control" required>
                <label class="form-label" for="Product">Product Title</label>
            </div>
            <!-- Brand input -->
            <div class="form-outline mb-4">
                <input type="text" id="Brand" name="Brand" class="form-control" required>
                <label class="form-label" for="Brand">Brand Name</label>
            </div>
            <!-- age input -->
            <label class="form-label" for="Age">Product Age</label>
            <div class="form-outline mb-4">
                <select id="Age" name="Age" class="form-control" required>
                    <option value="1 Year">1 Year</option>
                    <option value="2 Years">2 Year</option>
                    <option value="3 Years">3 Year</option>
                    <option value="4 Years">4 Year</option>
                    <option value="5+ Years">5 Year</option>
                </select>


            </div>
            <!-- Condition input -->
            <label class="form-label" for="Condition">Condition</label>
            <div class="form-outline mb-4">
                <select id="Condition" name="Condition" class="form-control" required>
                    <option value="Poor">Poor</option>
                    <option value="Good">Good</option>
                    <option value="New">New</option>
                </select>
            </div>
            <!-- Condition input -->
            <label class="form-label" for="Category">Category</label>
            <div class="form-outline mb-4">
                <select id="Category" name="Category" class="form-control" required>
                    <option value="Camera">Camera</option>
                    <option value="Phone">Phone</option>
                    <option value="Transport">Transport</option>
                    <option value="Computer">Computer</option>
                    <option value="TV's">TV's</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Music">Music</option>
                </select>
            </div>
            <!-- Price input -->
            <div class="form-outline mb-4">
                <input type="text" id="Price" name="Price" class="form-control" required>
                <label class="form-label" for="Price">Price in £</label>
            </div>
            <!-- Description input -->
            <div class="form-outline mb-4">
                <input type="text" id="Description" name="Description" class="form-control" required>
                <label class="form-label" for="Description">Description</label>
            </div>
            <!-- iamge (temp) input 
            <div class="form-outline mb-4">
                <input type="file" name="image" id="image" class="form-control">
                <label class="form-label" for="image">Image</label>

            </div>
            -->

            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" required name="fileToUpload" id="fileToUpload required">
                <input type="submit" value="Upload Image"
                    class="p-2 pl-6 pr-6 rounded-xl bg-orange-300 hover:bg-orange-200" name="submit">
            </form>






            <!-- Submit button -->

            <a class="p-2 rounded-xl bg-green-400 hover:bg-green-300" href="adminHome.php">Back</a>


        </form>



    </div>












    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>