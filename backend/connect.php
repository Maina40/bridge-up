<?php
// Prevent direct access to this file
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    http_response_code(403);
    exit('Access denied.');
}

$host = 'sql113.infinityfree.com';
$user = 'if0_39976118';
$pass = 'zGNx0etV1IcB';
$dbname = 'if0_39976118_bridge_up';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
