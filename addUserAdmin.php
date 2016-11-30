<?php
include ("dbconnect.php");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$company = $_POST['company'];
$role = $_POST['role'];
$date = date_create($_POST['startDate']);
$startDate = date_format($date, "Y/m/d");

if ($db->connect_error){
    die("Connection failed: " .$db->connect_error);
}


$sql = "INSERT INTO people (first_name, last_name, user_name, user_password, company, role, start_date)
            VALUES ('$firstName', '$lastName', '$userName', '$password', '$company', '$role', '$startDate')";

if (mysqli_query($db, $sql)) {
    echo "New record created successfully";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>