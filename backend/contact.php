<?php
// ...connect to DB...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // WhatsApp API link (using wa.me for direct message)
    $whatsapp_number = '254102727696';
    $text = urlencode("Bridge Up Contact Form\nName: $name\nEmail: $email\nMessage: $message");
    $wa_url = "https://wa.me/$whatsapp_number?text=$text";

    header("Location: $wa_url");
    exit();
} else {
    header('Location: ../contact.html?error=invalid');
    exit();
}
?>
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
