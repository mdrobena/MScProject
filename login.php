<?php
session_start();

include ("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $host = 'ap-cdbr-azure-east-c.cloudapp.net';
    $db   = 'md1511989';
    $user = 'b21d7723d488a2';
    $pass = '7359d184';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    try {

    /*    $stmt = mysqli_stmt_init($db);
    //$username = mysqli_real_escape_string($db, $_POST['username']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT role FROM people WHERE user_name = ? AND user_password = ?";
    //$result = mysqli_query($db, $sql);

    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_bind_param($stmt,"s",$password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $role);*/

        $stmt = $pdo->prepare('SELECT role FROM people WHERE user_name = :user_name AND user_password = :user_password');
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $stmt->execute(['user_name' => $username, 'user_password' => $password]);
        $row = $stmt->fetch();


    //$count = mysqli_num_rows($result);
    //$row = $stmt->fetch();
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