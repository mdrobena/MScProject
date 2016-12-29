<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    try {

        $stmt = mysqli_stmt_init($db);
    //$username = mysqli_real_escape_string($db, $_POST['username']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT role FROM people WHERE user_name = ? AND user_password = ?";
    //$result = mysqli_query($db, $sql);

    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_bind_param($stmt,"s",$password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $role);

    //$count = mysqli_num_rows($result);
    $row = $stmt->fetch();
    $role = $row['role'];

    if ($role == "user") {
        header("location: userView.php");
        exit();
    } elseif ($role == "admin") {
        header("location: adminView.php");
        exit();
    } else {
        header("location: index.html");
        exit();
    }
    }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
else{echo 'dsds';}
?>