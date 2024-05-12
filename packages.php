<?php
// DB connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "travelagency";

// Creation of connection
$conn = new mysqli($servername, $username, $password, $database);

// Checkings of connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch packages from the DB
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);


$packages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
}

// closing the connection
$conn->close();

echo json_encode($packages);
?>
