<?php
$mysqlHost = 'localhost';
$mysqlUsername = 'root';
$mysqlPassword = 'Karthi2411**';
$mysqlDatabase = 'd2';

$mysqli = new mysqli($mysqlHost, $mysqlUsername, $mysqlPassword, $mysqlDatabase);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}


$name = $_POST['username'];
$email = $_POST['email'];
$password= $_POST['password'];  
    $stmt = $mysqli->prepare("INSERT INTO users (username,email,password)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE
    username= VALUES(username),
    email = VALUES(email),
    password = VALUES(password)");
    $stmt->execute([$name,$email,$password]);
    if ($stmt->execute()) {
      $successMessage = array("success" => "User registration successful");
      echo json_encode($successMessage);
    } else {
        echo "Error saving user status in MySQL: " . $stmt->error;
    }
    $stmt->close();
$mysqli->close();
?>