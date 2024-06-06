<?php
$dsn = 'oci:dbname=//localhost:1521/your_service_name'; // Update with your Oracle DB service name
$username = 'userauth';
$password = 'your_password';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
