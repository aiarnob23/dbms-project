<?php
// Connect to your database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "travelagency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch packages from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);

// Initialize an empty array to store package data
$packages = [];

// Fetch packages and store them in the array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
}

// Close connection
$conn->close();

// Encode packages data as JSON and echo it
echo json_encode($packages);
?>
