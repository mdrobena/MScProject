<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password' LIMIT 1";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    $role = $row['role'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row


    if ($role == "user") {
        $_SESSION['login_user'] = $username;
        $_SESSION['login_role'] = $role;
        header("location: userView.php");
        exit();
    } elseif ($role == "admin") {
        $_SESSION['login_user'] = $username;
        $_SESSION['login_role'] = $role;
        header("location: adminView.php");
        exit();
    } else {
        $_SESSION['login_error'] = 1;
    }

}
else{}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- These 3 meta tags must come first in the head-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- any other head content must come *after* these tags -->

    <!--My favicon logo-->
    <link rel="icon" href="image/favicon.ico">

    <title>Log in</title>

    <!-- Bootstrap minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">


</head>

<body>
<!--Log in form-->
<div class="container">
    <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please log in</h2>
        <label for="username" class="sr-only">User ID</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="User ID" required autofocus><br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
    <div class="container">
        <?php
        if($_SESSION['login_error'] == 1){
            echo "<strong>Invalid User ID and/or Password!</strong>";
            session_destroy();
        }
        ?>
    </div>
    <?php
    if($_SESSION['login_error'] == 1) {
        ?>
        <div class='alert alert-dismissable alert-danger'>;
            <button type='button' class='close' data-dismiss='alert'>&times;</button>;
            <strong>Invalid User ID and/or Password!</strong>;
        </div>
        <?php
    }
    ?>
</div>

<!--jQuery library-->
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>

<!-- Bootstrap minified JavaScript -->
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>
