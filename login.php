<?php
session_start();
require 'connect.php';

// $conn is already defined in connect.php
if (!$conn || $conn->connect_error) {
  http_response_code(500);
  echo json_encode(['error' => 'Database connection failed']);
  exit;
}

// Load comments from database
function loadComments($conn) {
  $result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
  $comments = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $comments[] = $row;
    }
  }
  return $comments;
}

// Add a new comment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $text = $_POST['text'] ?? '';
  if ($name && $text) {
    $stmt = $conn->prepare("INSERT INTO comments (name, text) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $text);
    $stmt->execute();
    echo json_encode(['id' => $conn->insert_id, 'name' => $name, 'text' => $text]);
    exit;
  }
}

// Delete a comment
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  parse_str(file_get_contents("php://input"), $_DELETE);
  $id = $_DELETE['id'] ?? '';
  if ($id) {
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
  }
  exit;
}

header('Content-Type: application/json');
echo json_encode(loadComments($conn));
?>