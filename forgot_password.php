<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update with your MySQL password
$dbname = "UserAuthDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$dob = $_POST['dob'];
$new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

$sql = "SELECT * FROM users WHERE email='$email' AND dob='$dob'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
        header("Location: login.html");
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "No user found with this email and date of birth";
}

$conn->close();
?>
