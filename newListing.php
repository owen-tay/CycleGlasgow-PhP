<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

</head>

<body>
    <?php
    //this is to check the post method works
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //another if statement to check if the username already exists 
        //vars and setting up statement
        $username = $_POST['username'];


        if ($username == $user_db) {
            $errorMsg = "username exists";
        } else {


            //form inputs variables
            $username = $_POST['username'];
            //define username as ses
            $username = $_SESSION['username'];
            //prepared sql statement with the var $stmt
            //(conn from conx file uses prepare function to insert info into the user details table)
            $stmt = $conn->prepare("INSERT INTO listings (user, pwd) VALUES (?,?)");

            //now we "bind" the vars to the statement. This should tell the statment the kind of values to expect
            //eg strings "ss (string string)
            $stmt->bind_param("ss", $username, $password);

            //now we run the statement
            $stmt->execute();
            $stmt->close();
            $conn->close();

            //then we navigate to login.php and close this script!
            header("location: login-start.php");
            exit();
        }

    }

    ?>

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
        <form method="POST" name="login_form" action=" <?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
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
            <!-- Brand input -->
            <div class="form-outline mb-4">
                <input type="text" id="Age" name="Age" class="form-control" required>
                <label class="form-label" for="Age">Product Age</label>
            </div>




            <!-- Submit button -->
            <input type="submit" name="submit" class="p-2 pl-6 pr-6 rounded-xl bg-orange-300 hover:bg-orange-200"
                value="Register">
            <a class="p-2 rounded-xl bg-green-400 hover:bg-green-300" href="login-start.php">Login Page</a>


        </form>


    </div>












    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>