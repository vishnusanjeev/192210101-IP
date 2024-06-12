<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookings_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO bookings (bike_type, company, date, time, duration, extras, comments) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiss", $bikeType, $company, $date, $time, $duration, $extras, $comments);

// Set parameters and execute
$bikeType = $_POST['bike-type'];
$company = $_POST['company'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$extras = isset($_POST['extras']) && is_array($_POST['extras']) ? implode(", ", $_POST['extras']) : '';
$comments = $_POST['comments'];

$stmt->execute();

echo "Booking stored successfully.";

$stmt->close();
$conn->close();
?>
