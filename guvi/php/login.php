<?php
$mysqlHost = 'localhost';
$mysqlUsername = 'root';
$mysqlPassword = 'Karthi2411**';
$mysqlDatabase = 'd2';

$mysqli = new mysqli($mysqlHost, $mysqlUsername, $mysqlPassword, $mysqlDatabase);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$password= $_POST['password'];  
    $stmt = $mysqli->prepare("SELECT username,email,password from users where email=? and password=?");
    $stmt->execute([$email,$password]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows==1) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $successMessage = array("success" => "User login successful", "username" => $username);
        echo json_encode($successMessage);
    } else {
        $errorMessage = array("error" => "Invalid username or password");
      echo json_encode($errorMessage);
    }
    $stmt->close();
$mysqli->close();
?>