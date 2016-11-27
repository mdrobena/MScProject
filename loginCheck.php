<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 27/11/2016
 * Time: 16:12
 */
//including connection to my db
include ("dbconnect.php");

//POST method to get user's ID and password from index.html
$user = $_POST["userID"];
$password = $_POST["password"];

//a query that returns the user's role(admin or user)
$sql = "SELECT user_role FROM people WHERE user_name = '$user' AND user_password = '$password'";

//mysqli_query takes two parameters $db(db connection) and $sql variable
$result = mysqli_query($db, $sql);

if($result == "user"){
    /*session_start();
    $_SESSION['access_level'] = "standarduser";
    setcookie('access_level', 'standarduser');*/
    header("Location:userView.php");
}
elseif($result == "admin"){
    header("Location:adminView.php");
}
else{
    header("Location:index.html");
}
?>