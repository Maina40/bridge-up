<?php
// Ensure the events directory exists
$targetDir = "../images/events/";
if (!is_dir("../images")) {
    mkdir("../images", 0777, true); // Use 0777 for broader permissions
}
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Use 0777 for broader permissions
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $file = $_FILES['photo'];
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $filename = uniqid('event_', true) . '.' . $ext;
    $targetFile = $targetDir . $filename;

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        header("Location: ../gallery.html?error=upload");
        exit();
    }

    if (in_array($ext, $allowed) && $file['size'] > 0 && $file['size'] < 5 * 1024 * 1024) {
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            header("Location: ../gallery.html?success=1");
            exit();
        } else {
            header("Location: ../gallery.html?error=upload");
            exit();
        }
    } else {
        header("Location: ../gallery.html?error=invalid");
        exit();
    }
} else {
    header("Location: ../gallery.html?error=invalid");
    exit();
}
?>
