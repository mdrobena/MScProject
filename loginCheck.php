<?php
//connection to my db
include ("dbconnect.php");

//POST method to get user's ID and password from index.html
$user = $_POST["userID"];
$password = $_POST["password"];

//a query that returns the user's role(admin or user)
$sql = "SELECT user_role FROM people WHERE user_name = '$user' AND user_password = '$password'";

//mysqli_query takes two parameters $db(db connection) and $sql variable
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) == 1) {
    if ($result["user_role"] == "user") {
        header("location: userView.php");
    }
    elseif ($result["user_role"] == "admin") {
        header("location: adminView.php");
    }
}
else {
    header("location: index.html");
}

?>