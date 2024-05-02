<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $packageId = $_POST['package_id'];

    // Connect to your database
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $database = "travelagency"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert booking details into the bookings table
    $sqlBookings = "INSERT INTO bookings (name, email, phone, package_id, booking_time) VALUES (?, ?, ?, ?, NOW())";
    $stmtBookings = $conn->prepare($sqlBookings);
    $stmtBookings->bind_param("ssis", $name, $email, $phone, $packageId);

    // Execute the statement for bookings table
    if ($stmtBookings->execute()) {
        echo "Booking confirmed successfully!";
    } else {
        echo "Error: " . $sqlBookings . "<br>" . $conn->error;
    }

    // Prepare SQL statement to insert user details into the users table
    $sqlUsers = "INSERT INTO users (name, email, phone) VALUES (?, ?, ?)";
    $stmtUsers = $conn->prepare($sqlUsers);
    $stmtUsers->bind_param("sss", $name, $email, $phone);

    // Execute the statement for users table
    if ($stmtUsers->execute()) {
        echo "User details stored successfully!";
    } else {
        echo "Error: " . $sqlUsers . "<br>" . $conn->error;
    }

    // Close statements and connection
    $stmtBookings->close();
    $stmtUsers->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the booking page
    header("Location: booking.php");
    exit;
}
?>
