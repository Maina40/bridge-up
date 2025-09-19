<?php
// This file connects PHP to your MySQL database using mysqli.
// Make sure you have imported bridgeup.sql into your MySQL server.
// Usage: include or require this file in any PHP script needing DB access.
// Example: require 'backend/db.php';
// $conn is your database connection object.

$host = 'sql113.infinityfree.com';
$user = 'if0_39976118';
$pass = 'zGNx0etV1IcB';
$dbname = 'if0_39976118_bridge_up';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
