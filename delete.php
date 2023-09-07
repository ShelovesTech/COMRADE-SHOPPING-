<?php
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "products";
$con = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

if (!$con) {
    die("db connection failed" . mysqli_connect_error());
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = mysqli_query($con, "DELETE FROM product_details WHERE product_id='$id'");
    if ($sql == true) {
        echo '<script type="text/javascript">alert("Product successfully deleted!"); window.location=\'viewproducts.php\';</script>';
    } else {
        echo "Unable to delete product";
    }
}
?>
