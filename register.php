<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dob = $_POST['dob'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "INSERT INTO users (email, password, dob) VALUES (:email, :password, TO_DATE(:dob, 'YYYY-MM-DD'))";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':dob', $dob);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
