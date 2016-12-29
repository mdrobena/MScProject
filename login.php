<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    try {



    //$username = mysqli_real_escape_string($db, $_POST['username']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password'";
    //$result = mysqli_query($db, $sql);

    if($stmt = $db -> prepare($sql)){
        $stmt->execute();
        $stmt->bind_result($username, $password);
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