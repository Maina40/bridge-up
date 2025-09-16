<?php
$comments_file = '../data/comments.json';

// Ensure comments file exists
if (!file_exists($comments_file)) {
    file_put_contents($comments_file, '[]');
}

// Allow CORS for local development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight for DELETE
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

// Handle GET: return all comments
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo file_get_contents($comments_file);
    exit();
}

// Handle POST: add a new comment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $name = trim($input['name'] ?? '');
    $text = trim($input['text'] ?? '');
    if ($name && $text) {
        $comments = json_decode(file_get_contents($comments_file), true);
        $id = time() . rand(1000,9999);
        $comments[] = ['id' => $id, 'name' => htmlspecialchars($name), 'text' => htmlspecialchars($text)];
        file_put_contents($comments_file, json_encode($comments));
        http_response_code(201);
    } else {
        http_response_code(400);
    }
    exit();
}

// Handle DELETE: remove a comment by id
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str($_SERVER['QUERY_STRING'], $params);
    $id = $params['id'] ?? '';
    if ($id) {
        $comments = json_decode(file_get_contents($comments_file), true);
        $comments = array_filter($comments, function($c) use ($id) { return $c['id'] != $id; });
        file_put_contents($comments_file, json_encode(array_values($comments)));
        http_response_code(204);
    } else {
        http_response_code(400);
    }
    exit();
}
?>
