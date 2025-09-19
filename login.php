<?php
session_start();
require 'backend/connect.php';

// Load comments from database
function loadComments() {
  $conn = connect();
  $stmt = $conn->prepare("SELECT * FROM comments ORDER BY created_at DESC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new comment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $text = $_POST['text'] ?? '';
  if ($name && $text) {
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO comments (name, text) VALUES (:name, :text)");
    $stmt->execute(['name' => $name, 'text' => $text]);
    echo json_encode(['id' => $conn->lastInsertId(), 'name' => $name, 'text' => $text]);
  }
  exit;
}

// Delete a comment
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  parse_str(file_get_contents("php://input"), $_DELETE);
  $id = $_DELETE['id'] ?? '';
  if ($id) {
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = :id");
    $stmt->execute(['id' => $id]);
  }
  exit;
}

header('Content-Type: application/json');
echo json_encode(loadComments());
?>