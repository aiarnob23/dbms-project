<?php
// Check if the package ID is set in the query parameters
if (isset($_GET['id'])) {
    // Retrieve package ID from the query parameters
    $packageId = $_GET['id'];

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

    // Query to fetch package information from the database based on the package ID
    $sql = "SELECT * FROM packages WHERE id = $packageId";
    $result = $conn->query($sql);

    // Check if the query returned any result
    if ($result->num_rows > 0) {
        // Fetch package information
        $row = $result->fetch_assoc();
        $packageName = $row['name'];
        $packageDescription = $row['description'];
        $packagePrice = $row['price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>

    <h2>Package Information:</h2>
    <p>Package Name: <?php echo $packageName; ?></p>
    <p>Description: <?php echo $packageDescription; ?></p>
    <p>Price: $<?php echo $packagePrice; ?></p>

    <h2>Customer Information:</h2>
    <form action="confirm_booking.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <input type="hidden" name="package_id" value="<?php echo $packageId; ?>">
        <input type="submit" value="Confirm Booking">
    </form>
</body>
</html>

<?php
    } else {
        echo "Package not found!";
    }

    // Close connection
    $conn->close();
} else {
    echo "Package ID is missing!";
}
?>