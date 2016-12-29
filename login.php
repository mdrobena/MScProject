<?php
session_start();

include ("dbconnect.php");

if ($_POST['login']){

$servername = "ap-cdbr-azure-east-c.cloudapp.net";
$dbusername = "b21d7723d488a2";
$dbpassword = "7359d184";
$dbname = "md1511989";

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
try {
    $oDB = new PDO("mysql:host=$servername; dbname=$dbname", $dbusername, $dbpassword);
    $stmt = $oDB->prepare("SELECT role FROM people WHERE user_name = :user_name AND user_password = :user_password");
    $stmt->bindValue(':user_name', $username);
    $stmt->bindValue(':user_password', $password);
    $stmt->execute();


    //$username = mysqli_real_escape_string($db, $_POST['username']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    //$sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password'";
    //$result = mysqli_query($db, $sql);

    //$count = mysqli_num_rows($result);
    $role = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $role;
    echo $role;
    //$role = $row['role'];

    if ($role == "user") {
        header("location: userView.php");
        exit();
    } elseif ($role == "admin") {
        header("location: adminView.php");
        exit();
    } else {
        header("location: index.html");
        echo 'Wrong credentials!';
        exit();
    }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}