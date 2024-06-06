<?php
$conn = oci_connect('userauth', 'your_password', 'localhost/XE'); // Update 'XE' with your Oracle DB service name

if (!$conn) {
    $e = oci_error();
    echo "Connection failed: " . $e['message'];
} else {
    echo "Connected successfully";
}
?>
