<!--Date created: Monday 13th May 2019. Created By:Lewis Marrow. For Application:Soft256-->
<!--This page is used by the application to add interact with the database-->
<?php
//Specifiy login credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbSoft256ExeRivePublication";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}