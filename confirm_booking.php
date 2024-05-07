<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $packageId = $_POST['package_id'];

    // Connect to your database
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $db_password = ""; // Your MySQL password
    $database = "travelagency"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert user details into the customers table
    $sql_customer = "INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)";
    $stmt_customer = $conn->prepare($sql_customer);
    $stmt_customer->bind_param("sss", $name, $email, $phone);

    // Execute the statement for customers table
    if ($stmt_customer->execute()) {
        // Prepare SQL statement to insert booking details into the bookings table
        $sql_booking = "INSERT INTO bookings (email, password, package_id, booking_time) VALUES (?, ?, ?, NOW())";
        $stmt_booking = $conn->prepare($sql_booking);
        $stmt_booking->bind_param("sss",  $email, $password, $packageId);

        // Execute the statement for bookings table
        if ($stmt_booking->execute()) {
            echo "Booking confirmed successfully!";
        } else {
            echo "Error: " . $sql_booking . "<br>" . $conn->error;
        }
        // Close statement for bookings table
        $stmt_booking->close();
    } else {
        echo "Error: " . $sql_customer . "<br>" . $conn->error;
    }

    // Close statement and connection for customers table
    $stmt_customer->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the booking page
    header("Location: booking.php");
    exit;
}
?>
