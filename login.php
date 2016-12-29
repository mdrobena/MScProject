<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $role = "";

    $conn = $db;

    $stmt = $conn->prepare('SELECT role FROM people WHERE user_name = ? AND user_password = ?');
    //$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $stmt->bindParam('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($role);
    $stmt->store_result();
    //$row = $stmt->fetch();


    //$count = mysqli_num_rows($result);
    //$row = $stmt->fetch();
    //$role = $row['role'];
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