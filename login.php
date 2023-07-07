<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "752003";
$dbname = "musicplayer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Prepare the SQL statement
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);

	// Check if the user exists
	if($result->num_rows > 0) {
        // User exists, set session variables and redirect to dashboard or home page
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        // User does not exist, display error message
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();

// Redirect to index.html if already logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	header("Location: index.html");
	exit;
}

?>
