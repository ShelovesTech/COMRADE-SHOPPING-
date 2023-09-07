<!DOCTYPE html>
<html>
<head>
	<title>Registered Users</title>
	<link rel="stylesheet" type="text/css" href="users.css">
</head>
<body>
	<h1>Registered Users</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php
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

			// Fetch all user records from the database
			$sql = "SELECT id, username, email FROM sign_up";
			$result = mysqli_query($con, $sql);

			// Loop through all records and display them in the table
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "</tr>";
			}

			// Close database connection
			mysqli_close($con);
		?>
	</table>
</body>
</html>
