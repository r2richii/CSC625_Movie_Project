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

// Initialize variables
$username = "";
$password = "";
$loginError = "";

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the user input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to retrieve user data
    $sql = "SELECT Password FROM User_Login WHERE Username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt !== false && sqlsrv_has_rows($stmt)) {
        // Fetch the row
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Password is correct, user is logged in
            session_start();
            $_SESSION['username'] = $username;
            header("Location: main.php"); // Redirect to the welcome page
            exit();
        }
    }

    $loginError = "Invalid username or password";
}

// Close the statement and the database connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>