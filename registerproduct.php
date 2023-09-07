<?php
// Establish database connection
<?php
$dbserver="localhost";
$dbusername="root";
$dbpassword="";
$dbname="products";
$con=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);


if(!$con)
{
    die("db connection failed" . mysqli_connect_error());
}

// Get product details from the form
$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_quantity = $_POST["product_quantity"];

// Prepare the query
$query = "INSERT INTO orders (product_id, product_name, product_price, product_quantity) VALUES ('$product_id', '$product_name', '$product_price', '$product_quantity')";

// Execute the query
if (mysqli_query($con, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

