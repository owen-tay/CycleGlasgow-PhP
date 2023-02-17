<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
$errorMsg = "" //blank by default
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php

    /*php code goes here */

    //checks if server has sent via post method
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //another if statement to check if the username already exists 
        //vars and setting up statement
        $username = $_POST['username'];
        $check_user = $conn->prepare("SELECT user FROM user_details WHERE user=?");
        $check_user->bind_param("s", $username);
        $check_user->bind_result($user_db);
        $check_user->execute();
        $check_user->fetch();

        if ($username == $user_db) {
            $errorMsg = "username exists";
        } else {


            //form inputs variables
            $username = $_POST['username'];
            $password = $_POST['password'];
            //password hash
            $password = password_hash($password, PASSWORD_DEFAULT);

            //prepared sql statement with the var $stmt
            //(conn from conx file uses prepare function to insert info into the user details table)
            $stmt = $conn->prepare("INSERT INTO user_details (user, pwd) VALUES (?,?)");

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
    <div class="container">
        <h2>Register form - activity #1</h2>
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
                    <?php echo $errorMsg;
                    ?>
                </p>
            </div>

            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Register">
            <a class="btn btn-secondary btn-block mb-4" href="login-start.php" >Login Page</a>


        </form>

        <p>This example receives form data sent by the POST method and inserts into a database. The form in this
            instance posts back to itself rather than executing an external php file - $_SERVER["PHP_SELF"].

        <p>The problem with this method is that you can add duplicate entries of the username. The username must be
            unique. The password doesn't. Informing a user that a password exists would create a security breach.</p>
    </div>

</body>

</html>

