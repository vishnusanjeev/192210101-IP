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

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the username and password match a record in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User is authenticated, redirect to home page
    header("Location: home.html");
} else {
    // Authentication failed, redirect back to login page
    header("Location: login.html");
}

$conn->close();
?>
