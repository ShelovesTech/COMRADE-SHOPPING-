<?php
// Start the session
session_start();

// Connect to the database
$con=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

// Check if the connection is successful
if(!$con)
{
    die("db connection failed" . mysqli_connect_error());
}

// Get the product details from the database
$product_id = $_POST['product_id'];
$sql = "SELECT * FROM product_details WHERE id = '$product_id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// Check if the product exists in the cart
if (isset($_SESSION['cart'][$product_id])) {
    // Increment the quantity if the product already exists in the cart
    $_SESSION['cart'][$product_id]['quantity']++;
} else {
    // Add the product to the cart if it doesn't exist in the cart
    $_SESSION['cart'][$product_id] = array(
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => 1
    );
}

// Display the cart contents
echo '<h1>Cart</h1>';
if (!empty($_SESSION['cart'])) {
    echo '<ul>';
    foreach ($_SESSION['cart'] as $product_id => $product) {
        echo '<li>' . $product['name'] . ' - ' . $product['price'] . ' - ' . $product['quantity'] . '</li>';
    }
    echo '</ul>';
} else {
    echo 'Your cart is empty.';
}

// Store the cart data in the database when the user completes the purchase
if (isset($_POST['checkout'])) {
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $name = $product['name'];
        $price = $product['price'];
        $quantity = $product['quantity'];
        $sql = "INSERT INTO orders(product_id, name, price, quantity) VALUES ('$product_id', '$name', '$price', '$quantity')";
        mysqli_query($conn, $sql);
    }
    // Clear the cart after the purchase is completed
    $_SESSION['cart'] = array();
    echo 'Thank you for your purchase.';
}

// Close the database connection
mysqli_close($con);
?>
