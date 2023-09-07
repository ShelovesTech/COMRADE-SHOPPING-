<?php
// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate form data
if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    // One or more fields are empty
    echo "Please fill in all fields.";
    exit;
}

if($password !== $confirm_password) {
    // Passwords do not match
    echo "Passwords do not match.";
    exit;
}

// Connect to database (replace the placeholders with your actual database credentials)
$dbserver="localhost";
$dbusername="root";
$dbpassword="";
$dbname="products";
$con=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);


if(!$con)
{
    die("db connection failed" . mysqli_connect_error());
}

$verification_code = md5(uniqid(rand(), true));


// Insert user data into the database
$sql = "INSERT INTO sign_up (username, email, password) VALUES ('$username', '$email', '$password')";


if (mysqli_query($con, $sql)) {
    echo  "Account created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close database connection
mysqli_close($con);
?>






