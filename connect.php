<?php
// variables para conexion
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'mobilezone';

// creamos conexion
$con = new mysqli($server, $username, $password);

// Comprobamos la conexion
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
if (!mysqli_select_db($con, $database)) {
   exit('Error: could not select the database');
}

if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
