<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php
    session_start();
    session_unset();
    session_destroy()


    ?>
    <div class="container">
        <h2>Logged Out</h2>
        <a class="btn btn-secondary btn-block mb-4" href="login-start.php">Login Page</a>
    </div>

</body>

</html>

