<?php
// Start the session
session_start();

// Check if the "Add to Cart" button is clicked
if(isset($_POST["add_to_cart"])) {
    // Get the product details from the form
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $subtotal = '$price *$quantity';


    // Create an array to store the cart item
    $cart_item = array(
        "id" => $product_id,
        "product_name" => $product_name,
        "price" => $price,
        "quantity" => $quantity,
        "subtotal" => $subtotal,
        "timestamp" => time()
    );
    
    // Check if the cart is empty
    if(!isset($_SESSION["product_details"])) {
        // Initialize the cart with the first item
        $_SESSION["product_details"] = array($cart_item);
    } else {
        // Add the item to the existing cart
        array_push($_SESSION["product_details"], $cart_item);
    }
    
    // Insert the cart item into the database
    $con = mysqli_connect("localhost", "root", "", "products");
    $sql = "INSERT INTO product_details(product_name, price, quantity, subtotal, timestamp) VALUES ('$product_name', '$price', '$quantity', '$subtotal', NOW())";
    
    if(mysqli_query($con, $sql)) {
        echo "Item added to cart and database successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    
    mysqli_close($con);
    exit; // add this line to stop executing the code and prevent the "URL not found" error
}
?>


