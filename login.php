<?php
    include ("dbconnect.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password'";
        $result = mysqli_query($db, $sql);

        $count = mysqli_num_rows($result);
        $row = $result -> fetch_assoc();
        $role = $row['user_role'];

        if ($count == 1 && $role == "user"){
            header("location: userView.php");
            exit();
        }
        elseif ($count == 1 && $role == "admin"){
            header("location: adminView.php");
            exit();
        }
    }