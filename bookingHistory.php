<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
</head>
<body>
    <h1>Booking History</h1>

    <form action="bookingHistory.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Show Booking History">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

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

        // Query to fetch user details based on email and password
        $sql = "SELECT bookings.booking_id, customers.name AS customer_name, customers.email AS customer_email, customers.phone AS customer_phone, bookings.package_id, bookings.booking_time, packages.name AS package_name, packages.description, packages.price FROM bookings INNER JOIN packages ON bookings.package_id = packages.id INNER JOIN customers ON bookings.email = customers.email WHERE bookings.email = 'c@gmail.com' AND bookings.password = '6666'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display booking history
            echo "<h2>Booking History for $email</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Package Name</th>
                        <th>Package Description</th>
                        <th>Package Price</th>
                        <th>Booking Time</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row['booking_id']."</td>
                <td>".$row['customer_name']."</td>
                <td>".$row['customer_email']."</td>
                <td>".$row['customer_phone']."</td>
                <td>".$row['package_name']."</td>
                <td>".$row['description']."</td>
                <td>".$row['price']."</td>
                <td>".$row['booking_time']."</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No bookings found.";
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>
