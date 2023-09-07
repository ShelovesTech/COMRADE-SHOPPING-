<?php
// Establish database connection
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "products";
$con = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

if (!$con) {
    die("db connection failed" . mysqli_connect_error());
}

// Check if delete button is clicked
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    // Prepare the query to delete the selected row
    $query = "DELETE FROM product_details WHERE product_id=$id";
    mysqli_query($con, $query);
      // Add delete button
      echo "<form method='post'><input type='hidden' name='id' value='" . $row["product_id"] . "'><input type='text' name='name' value='" . $row["product_name"] . "'><input type='text' name='price' value='" . $row["price"] . "'><input type='text' name='quantity' value='" . $row["quantity"] . "'><input type='submit' name='delete' value='delete'></form>";
      echo "</td><td>";
}

// Check if update button is clicked
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    // Prepare the query to update the selected row
    $query = "UPDATE product_details SET product_name='$name', price='$price', quantity='$quantity' WHERE product_id=$id";
    mysqli_query($con, $query);
}

// Check if add button is clicked
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    // Prepare the query to add a new row
    $query = "INSERT INTO product_details (product_name, price, quantity) VALUES ('$name', '$price', '$quantity')";
    mysqli_query($con, $query);
}

// Prepare the query
$query = "SELECT * FROM product_details";

// Execute the query
$result = mysqli_query($con, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0)
    // Display the results in a table
    echo "<table>";
    echo "<tr><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Product Quantity</th><th>Edit</th><th>Delete</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["product_id"] . "</td><td>" . $row["product_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["quantity"] . "</td><td>";
        // Add edit button
        echo "<form method='post'><input type='hidden' name='id' value='" . $row["product_id"] . "'><input type='text' name='name' value='" . $row["product_name"] . "'><input type='text' name='price' value='" . $row["price"] . "'><input type='text' name='quantity' value='" . $row["quantity"] . "'><input type='submit' name='update' value='Update'></form>";
        echo "</td><td>";
        // Add delete button
        echo "<form method='post'><input type='hidden' name='id' value='" . $row["product_id"] . "'><input type='text' name='name' value='" . $row["product_name"] . "'><input type='text' name='price' value='" . $row["price"] . "'><input type='text' name='quantity' value='" . $row["quantity"] . "'><input type='submit' name='delete' value='delete'></form>";
        echo "</td><td>";
        echo "</td></tr>";
    }
    echo "<tr><td></td><td>";
    // Add input fields for adding a new product
    echo "<form method='post'><input type='text' name='name' placeholder='Product Name'><input type='text' name='price' placeholder='Product Price'><input type='text' name='quantity'></form>";

  
