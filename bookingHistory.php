<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- playcdn links of tailwindcss -->
     <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- link of raw css -->
    <link rel="stylesheet" href="./styles/style.css">
    <!-- playcdn links of daisyui -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Booking History</title>
</head>
<body class="container mx-auto">
<div>
        <a href="./home.php">Home</a>
    </div>
    <h1>Booking History</h1>

    <div class="mt-8 bg-gray-200 p-8 rounded-lg flex justify-center ">
    <form action="bookingHistory.php" method="post">
        <label for="email" >Email:</label>
        <input required type="email" id="email" name="email" required><br><br>
        <label for="password" >Password:</label>
        <input required class=" input input-bordered rounded-lg" type="password" id="password" name="password" required><br><br>
        <input class="btn btn-primary" type="submit" value="Show Booking History">
    </form>
    </div>

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
        $sql = "SELECT bookings.booking_id, customers.name AS customer_name, customers.email AS customer_email, customers.phone AS customer_phone, bookings.package_id, bookings.booking_time, packages.name AS package_name, packages.description, packages.price FROM bookings INNER JOIN packages ON bookings.package_id = packages.id INNER JOIN customers ON bookings.email = customers.email WHERE bookings.email = '$email' AND bookings.password = '$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display booking history
            echo "<h2>Booking History for $email</h2>";
            echo "<table class='table overflow-x-auto'>
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
            echo "<p class='text-red-500 font-bold'>No Bookings Found</p>";

        }

        // Close connection
        $conn->close();
    }
    ?>


</body>
</html>
