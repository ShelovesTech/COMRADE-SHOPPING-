<?php
// Retrieve form data
$user_name = $_POST['user_name'];

// Validate form data
if(empty($user_name)) {
    // User ID field is empty
    echo "Please provide a user ID.";
    exit;
}

// Connect to database (replace the placeholders with your actual database credentials)
$dbserver="localhost";
$dbusername="root";
$dbpassword="";
$dbname="products";
$con=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

if(!$con) {
    die("db connection failed" . mysqli_connect_error());
}

// Delete user data from the database
$sql = "DELETE FROM sign_up WHERE id = $user_name";

if (mysqli_query($con, $sql)) {
    echo "User deleted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//
