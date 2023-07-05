<?php
// Database configuration
$serverName = 'localhost';
$connectionOptions = array(
    'Database' => 'LOGIN_CREDENTIALS',
    'UID' => 'sa',
    'PWD' => 'CSC625databaseproject'
);

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get user input from the registration form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO User_Login (Username, Password) VALUES (?, ?)";
$params = array($username, $hashedPassword);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Registration successful!";
}

// Close the database connection
sqlsrv_close($conn);

// Redirect to login page after 10 seconds
header("refresh:2; url=/Login/home.html");
exit();
?>
