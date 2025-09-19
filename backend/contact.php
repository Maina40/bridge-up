<?php
// ...connect to DB...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $to = 'bridgeupcomm@gmail.com';
    $subject = "Bridge Up Contact Form: $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: Bridge Up Website <no-reply@bridgeup.org>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($message)) {
        if (mail($to, $subject, $body, $headers)) {
            header('Location: ../contact.html?success=1');
            exit();
        } else {
            error_log("Mail send failed: to=$to, subject=$subject, headers=$headers");
            header('Location: ../contact.html?error=send');
            exit();
        }
    } else {
        header('Location: ../contact.html?error=invalid');
        exit();
    }
} else {
    header('Location: ../contact.html?error=invalid');
    exit();
}
?>
?>
