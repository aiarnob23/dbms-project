<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $packageId = $_POST['package_id'];

    //DB connection
    $servername = "localhost";
    $username = "root";
    $db_password = ""; 
    $database = "travelagency"; 

    // Creation of connection
    $conn = new mysqli($servername, $username, $db_password, $database);

    // Checkings of connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_customer = "INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)";
    $stmt_customer = $conn->prepare($sql_customer);
    $stmt_customer->bind_param("sss", $name, $email, $phone);

    if ($stmt_customer->execute()) {
        $sql_booking = "INSERT INTO bookings (email, password, package_id, booking_time) VALUES (?, ?, ?, NOW())";
        $stmt_booking = $conn->prepare($sql_booking);
        $stmt_booking->bind_param("sss", $email, $password, $packageId);

        if ($stmt_booking->execute()) {
            echo "Booking confirmed successfully!";
            echo "<script>setTimeout(function(){ window.location.href = './home.php'; }, 1000);</script>";
        } else {
            echo "Error: " . $sql_booking . "<br>" . $conn->error;
        }
        $stmt_booking->close();
    } else {
        echo "Error: " . $sql_customer . "<br>" . $conn->error;
    }

    $stmt_customer->close();
    $conn->close();
} 
else {
    header("Location: booking.php");
    exit;
}
?>
