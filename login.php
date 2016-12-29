<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $role = "";

    $host = 'ap-cdbr-azure-east-c.cloudapp.net';
    $db = 'md1511989';
    $user = 'b21d7723d488a2';
    $pass = '7359d184';

    $mysqli = new mysqli($host, $user, $pass, $db);

    $stmt = $mysqli->prepare('SELECT role FROM people WHERE user_name = ? AND user_password = ?');
    //$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $stmt->bindParam("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->store_result();
    $row = $stmt->fetch();


    //$count = mysqli_num_rows($result);
    //$row = $stmt->fetch();
    $role = $row['role'];
    if($stmt->num_rows == 1) {
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
}
else{echo 'dsds';}
?>