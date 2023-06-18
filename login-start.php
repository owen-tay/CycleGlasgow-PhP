<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
$errorMsg = ""; //blank by default

if (isset($_GET['logged']) == "denied") {
    $errorMsg = "Unauthorseid attempt to bypass login";
    $logged = "";
}

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Header -->
    <?php include('modules/head.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-gradient-to-r from-blue-cycle to-pink-cycle">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-3xl">
            <div class="md:flex">
                <div class="hidden md:block md:w-1/2">
                    <img class="object-cover h-full w-full"
                        src="https://cycleglagow.yupstuff.net/images/glasgowImage.jpg" alt="Placeholder Image">
                </div>
                <div class="w-full p-8">
                    <div class="text-center mb-6">
                        <h1 class="font-bold text-3xl text-gray-900">Login</h1>
                        <p>Enter your information to login</p>
                    </div>
                    <form method="POST" name="login_form"
                        action="<?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="username">Username</label>
                            <div class="flex">
                            <input class="block w-full border border-gray-300 rounded py-2 px-3" type="text"
                                id="username" name="username" placeholder="username" required> <span class="username"></span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="password">Password</label>
                            <input class="block w-full border border-gray-300 rounded py-2 px-3" type="password"
                                id="password" name="password" placeholder="************" required>

                        </div>
                        <div class="mb-6">
                            <p class="text-red-500 text-xs">
                                <?php echo $errorMsg; ?>
                            </p>
                            <button type="submit" name="submit"
                                class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-full py-2 text-white rounded">Sign
                                In</button>
                            <a href="index.php">
                                <div
                                    class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-full py-2 mt-3 text-white rounded text-center">
                                    Back</div>
                            </a>
                        </div>
                    </form>
                    <p class="text-black text-center">
                        If you need an account, <a href="register-start.php" class="text-black"><span
                                class="text-blue-700">click
                                here</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

</html>