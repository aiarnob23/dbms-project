<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body class="">
    <h1>Booking Confirmation</h1>

    <h2>Package Information:</h2>
    <?php
    // Checking if package ID is set in the query parameters
    if (isset($_GET['id'])) {
        $packageId = $_GET['id'];

        // DB connection
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

        $sql = "SELECT * FROM packages WHERE id = $packageId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $packageName = $row['name'];
            $packageDescription = $row['description'];
            $packagePrice = $row['price'];

            echo "<p>Package Name: $packageName</p>";
            echo "<p>Description: $packageDescription</p>";
            echo "<p>Price: $$packagePrice</p>";

            $conn->close();
        } else {
            echo "Package not found!";
        }
    } else {
        echo "Package ID is missing!";
    }
    ?>

    <div>
    <h2>Customer Information:</h2>
    <form action="confirm_booking.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="hidden" name="package_id" value="<?php echo $packageId; ?>">
        <input type="submit" value="Confirm Booking">
    </form>
    </div>
</body>
</html>
