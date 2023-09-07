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
