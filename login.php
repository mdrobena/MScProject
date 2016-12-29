<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    /*
    $sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password' LIMIT 1";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    $role = $row['role'];*/
    $role = '';

    $host = "ap-cdbr-azure-east-c.cloudapp.net"; //"localhost" or "http://mysql.host.com"
    $user = "b21d7723d488a2"; //an authorized user of the MySQL database
    $pass = "7359d184"; //my_username's password
    $database = "md1511989"; //the database we want to use.

    $mysqli = new mysqli($host, $user, $pass, $database);
    $stmt = $mysqli->stmt_init();
    $stmt -> prepare("SELECT role FROM people WHERE user_name = ? AND user_password = ? LIMIT 1");
    $stmt -> bind_param("ss",$username,$password);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $stmt -> execute();
    $stmt->bind_result($role);
    $stmt->fetch();

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
        <a href="#" id="help" tabindex="0" role="button" data-trigger="focus" data-toggle="popover" data-html="true" title="Contact support" data-content="Email: support@well.org<br/>Phone: 004465975487">Forgot user id or password?</a>
        <br><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        <br>
        <br>
        <?php
        if($_SESSION['login_error'] == 1) {
            ?>
            <div class='alert alert-dismissable alert-danger'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Invalid User ID and/or Password!!!</strong>
            </div>
            <?php
            session_destroy();
        }
        ?>
    </form>

</div>

<!--jQuery library-->
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>

<!-- Bootstrap minified JavaScript -->
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(function () {
            $('[data-toggle="popover"]').popover()
        });


        $('#help').click(function(){
            $('#help').popover('toggle');
        });



    });
</script>

</body>
</html>
