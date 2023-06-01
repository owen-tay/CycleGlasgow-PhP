<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
$errorMsg = ""; //blank by default

//checks if server has sent via post method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Checking if the username already exists
    $check_user = $conn->prepare("SELECT user FROM user_details WHERE user=?");
    $check_user->bind_param("s", $username);
    $check_user->bind_result($user_db);
    $check_user->execute();
    $check_user->fetch();

    if ($username == $user_db) {
        $errorMsg = "Username exists";
    } else {
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user_details (user, pwd) VALUES (?,?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("location: login-start.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Header -->
    <?php include('modules/head.php'); ?>
</head>

<body class="bg-gradient-to-r from-blue-cycle to-pink-cycle">

    </nav>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-3xl">
            <div class="md:flex">
                <div class="hidden md:block md:w-1/2">
                    <img class="object-cover h-full w-full" src="images/glasgowimage.jpg" alt="Placeholder Image">
                </div>
                <div class="w-full p-8">
                    <div class="text-center mb-6">
                        <h1 class="font-bold text-3xl text-gray-900">Register</h1>
                        <p>Enter your information to register</p>
                    </div>
                    <form method="POST" name="register_form"
                        action="<?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="username">Username</label>
                            <input class="block w-full border border-gray-300 rounded py-2 px-3" type="text"
                                id="username" name="username" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2" for="password">Password</label>
                            <input class="block w-full border border-gray-300 rounded py-2 px-3" type="password"
                                id="password" name="password" required>
                        </div>
                        <div class="mb-6">
                            <p class="text-red-500 text-xs">
                                <?php echo $errorMsg; ?>
                            </p>
                            <button type="submit" name="submit"
                                class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-full py-2 text-white rounded">Register</button>
                        </div>
                    </form>
                    <p class="text-blue-cycle text-center">
                        If you have an account, <a href="login-start.php" class="text-pink-cycle"><span>click
                                here</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>