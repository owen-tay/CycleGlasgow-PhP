<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
$errorMsg = ""; //blank by default

if (isset($_GET['logged']) == "denied") {
    $errorMsg = "Unauthorseid attempt to bypass login";
    $logged = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
</head>


<body ">
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {



        //form inputs variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        //prepared select statement
        $stmt = $conn->prepare("SELECT user, pwd, isAdmin from user_details where user = ?");
        $stmt->bind_param("s", $username);
        //takes results and binds them to these three vars
        $stmt->bind_result($user_db, $pwd_db, $admin_db);
        //runs stmt
        $stmt->execute();
        //fetch
        $stmt->fetch();

        //con statement to check if u & p match & if they do location > homepage 
        if (password_verify($password, $pwd_db) && $username == $user_db) {
            $_SESSION['username'] = $username; //session start
            $_SESSION['isAdmin'] = $admin_db; //session start
            echo $admin_db;
            
            header('location:adminHome.php?logged=true');
            exit();
        } else {
            $errorMsg = "Login is Invalid";
        }

        $stmt->close();
        $conn->close();




    }
    

    /*php code goes here */



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
                            echo " login-start.php"; } else { echo "adminHome.php" ; } ?>" class="block py-2 pl-3 pr-4
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
        <h2 class="mb-8 text-xl text-center">Login</h2>
        <div id="login" class="container mx-auto">
        <form method="POST" name="login_form" action=" <?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
            <!--Convert some characters to HTML entities and strips HTML and PHP tags from a string -->
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="username" name="username" class="form-control" required>
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" required value="" />
                <label class="form-label" for="password">Password</label>

                <p class="errorMsg">
                    <?php echo $errorMsg; ?>
                </p>
            </div>




            <!-- Submit button -->
            <div class="mx-auto pb-3">
            <button type="submit" name="submit" class="p-2 pl-6 pr-6 rounded-xl bg-orange-300 hover:bg-orange-200">Sign in</button>
            <a class="p-2 rounded-xl bg-green-400 hover:bg-green-300" href="register-start.php">Register Page</a>
        </div>
        </div>


        </form>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>