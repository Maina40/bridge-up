<?php
// ...connect to DB...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $interest = $_POST['interest'] ?? '';
  // ...save to DB or send email...
  header('Location: ../get-involved.html?success=1');
  exit();
}
?>
