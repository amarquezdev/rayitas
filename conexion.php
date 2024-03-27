<?php
$hostname = "localhost";
$username = "rayitas";
$password = "rayas123";
$database = "rayitas";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn ->connect_error) /*{
die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
} else{
    echo $conn ->host_info;
}*/
?>
