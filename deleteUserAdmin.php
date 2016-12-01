<?php
include ("dbconnect.php");

$userID = $_POST['userID'];

if ($db->connect_error){
    die("Connection failed: " .$db->connect_error);
}


$sql = "DELETE FROM people WHERE user_id = '$userID'";

if (mysqli_query($db, $sql)) {
    header("location: adminView.php");
    exit();
   #echo "Record deleted successfully";
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);