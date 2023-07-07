<?php
  header("Location: login1.html");
  exit();

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

  // Prepare and bind statement
  $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $password, $email);

  // Set parameters and execute statement
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $stmt->execute();

  echo "Signup information inserted successfully.";

  // Close connection and statement
  $stmt->close();
  $conn->close();
?>
