<?php
// Connect to the database (replace the placeholders with your actual database credentials)
$dbserver="localhost";
$dbusername="root";
$dbpassword="";
$dbname="products";
$con=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

if(!$con) {
    die("db connection failed" . mysqli_connect_error());
}

// Retrieve the data from the database
$sql = "SELECT * FROM sign_up";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo "<table><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td></tr>";
        echo '<td><div align="center"><a href="editrecord.php?id='.$row['username'].'">Edit</a> | <a href=deletesignup.php?id='.$row['username'].'" title="click to delete">Delete</a></td>';
    }

    echo "</table>";
} else {
    echo "No results found.";
}

// Close database connection
mysqli_close($con);
?>
