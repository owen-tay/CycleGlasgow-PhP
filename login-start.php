<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
$errorMsg = ""; //blank by default

if (isset($_GET['logged']) == "denied"){
    $errorMsg = "Unauthorseid attempt to bypass login";
    $logged = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

        //form inputs variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        //prepared select statement
        $stmt = $conn->prepare("SELECT user, pwd from user_details where user = ?");
        $stmt->bind_param("s", $username);
        //takes results and binds them to these two vars
        $stmt->bind_result($user_db, $pwd_db);
        //runs stmt
        $stmt->execute();
        //fetch
        $stmt->fetch();

        //con statement to check if u & p match & if they do location > homepage 
        if (password_verify($password, $pwd_db) && $username == $user_db) {
            $_SESSION['username'] = $username; //session start
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
    <div class="container bg-orange-100">
        <h2>Login form</h2>
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
                <p class="errorMsg"><a href="register.php">Register</a></p>
            </div>



            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            <a class="btn btn-secondary btn-block mb-4" href="register-start.php">Register Page</a>


        </form>
    </div>

</body>

</html>

