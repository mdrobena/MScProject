<?php
session_start();

//include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$servername = "ap-cdbr-azure-east-c.cloudapp.net";
$dbusername = "b21d7723d488a2";
$dbpassword = "7359d184";
$dbname = "md1511989";

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
try {
    $oDB = new PDO("mysql:host=$servername; dbname=$dbname", $dbusername, $dbpassword);
    $oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $oDB->prepare("SELECT role FROM people WHERE user_name = ? AND user_password = ?");
    $stmt->execute([$username, $password]);


    //$username = mysqli_real_escape_string($db, $_POST['username']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    //$sql = "SELECT role FROM people WHERE user_name = '$username' AND user_password = '$password'";
    //$result = mysqli_query($db, $sql);

    //$count = mysqli_num_rows($result);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
else{echo 'dsds';}
?>