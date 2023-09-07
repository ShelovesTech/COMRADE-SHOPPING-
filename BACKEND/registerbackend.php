<?
include('dbcoll.php');


if(isset($_POST[submit])) {
    $Fullnames= trim($_POST['fullnames']);
    $Email = trim($_POST['Email ']); 
    $password= trim($_POST['password']);

    $sql=mysqli_query($con, "INSERT INTO login(fullnames,email,password)");
VALUES('$fullnames','$Email','$password','$now()');

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}



?>