<?php
// ...handle PayPal donation logic...
header('Location: ../get-involved.html?donate=paypal');
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donate with PayPal – Bridge Up</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <style>
    .paypal-details {
      background: rgba(255,255,255,0.03);
      padding: 1.5em;
      border-radius: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      max-width: 500px;
      margin: 2em auto;
      text-align: center;
    }
    .paypal-btn {
      background: #0070ba;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 0.8em 1.5em;
      cursor: pointer;
      transition: background 0.2s;
      text-decoration: none;
      display: inline-block;
      margin-top: 16px;
      font-size: 1.1em;
    }
    .paypal-btn:hover {
      background: #003087;
    }
    .copy-btn {
      background: #ff4b4b;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 0.5em 1em;
      cursor: pointer;
      margin-left: 8px;
      font-size: 1em;
    }
    .copy-btn:active {
      background: #ff8f4b;
    }
    .paypal-icon {
      vertical-align: middle;
      margin-right: 8px;
      height: 32px;
    }
    @media (max-width: 600px) {
      .paypal-details {
        padding: 1em;
        font-size: 1em;
      }
      .paypal-btn, .copy-btn {
        width: 100%;
        margin: 12px 0 0 0;
      }
    }
  </style>
</head>
<body>
  <div class="wrap">
    <header class="top">
      <div class="brand">
        <img src="images/logo.jpg" alt="Bridge Up Logo" class="logo" style="width:56px;height:56px;border-radius:12px;object-fit:cover;">
        <div>
          <h1>Bridge Up</h1>
          <p>Connect. Serve. Grow.</p>
        </div>
      </div>
      <nav class="hero-cta">
        <a href="index.html" class="btn-ghost">Home</a>
        <a href="about.html" class="btn-ghost">About</a>
        <a href="programs.html" class="btn-ghost">Programs</a>
        <a href="gallery.html" class="btn-ghost">Gallery</a>
        <a href="get-involved.html" class="btn-primary">Get Involved</a>
        <a href="contact.html" class="btn-ghost">Contact</a>
      </nav>
    </header>
    <main class="container">
      <section>
        <div class="paypal-details">
          <h2>Donate with PayPal</h2>
          <p>
            Support Bridge Up securely via PayPal.<br>
            <strong>PayPal Email:</strong>
            <span id="paypal-email" style="font-weight:bold;color:#0070ba;">bridgeupcomm@gmail.com</span>
            <button class="copy-btn" onclick="copyPaypal()">Copy</button>
          </p>
          <a href="https://www.paypal.com/paypalme/bridgeupcomm" target="_blank" class="paypal-btn">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/paypal.svg" alt="PayPal" class="paypal-icon">
            Go to PayPal
          </a>
          <p style="margin-top:18px;color:#94a3b8;">
            You can send your donation directly to our PayPal email.<br>
            After payment, please contact us to confirm your donation.
          </p>
        </div>
      </section>
    </main>
    <footer>
      <div style="width:100%;text-align:center;color:#94a3b8;font-size:13px;">
        &copy; <?= date('Y') ?> Bridge Up. All rights reserved.
      </div>
    </footer>
  </div>
  <script>
    function copyPaypal() {
      var email = document.getElementById('paypal-email').textContent;
      if (navigator.clipboard) {
        navigator.clipboard.writeText(email).then(function() {
          alert('PayPal email copied!');
        });
      } else {
        // fallback for older browsers
        var temp = document.createElement('input');
        document.body.appendChild(temp);
        temp.value = email;
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        alert('PayPal email copied!');
      }
    }
  </script>
</body>
</html>
