<?php


$username = "root";
$password = "";
$hostname = "localhost";
$mainDB = "test"; 


// Connection to mysql Server
$conn = mysqli_connect($hostname, $username, $password, $mainDB)
or die("Unable to connect to MySQL");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Set autocommit to off
mysqli_autocommit($conn,FALSE);



?>