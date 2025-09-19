<?php
// ...handle Stripe donation logic...
header('Location: ../get-involved.html?donate=stripe');
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donate with Stripe – Bridge Up</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <style>
    .stripe-details {
      background: rgba(255,255,255,0.03);
      padding: 1.5em;
      border-radius: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      max-width: 500px;
      margin: 2em auto;
      text-align: center;
    }
    .stripe-btn {
      background: #635bff;
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
    .stripe-btn:hover {
      background: #3f3fff;
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
    .stripe-icon {
      vertical-align: middle;
      margin-right: 8px;
      height: 32px;
    }
    @media (max-width: 600px) {
      .stripe-details {
        padding: 1em;
        font-size: 1em;
      }
      .stripe-btn, .copy-btn {
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
        <div class="stripe-details">
          <h2>Donate with Stripe</h2>
          <p>
            Support Bridge Up securely via Stripe.<br>
            <strong>Stripe Link:</strong>
            <span id="stripe-link" style="font-weight:bold;color:#635bff;">https://buy.stripe.com/test_00g7vYc8A2gA1gM5kk</span>
            <button class="copy-btn" onclick="copyStripe()">Copy</button>
          </p>
          <a href="https://buy.stripe.com/test_00g7vYc8A2gA1gM5kk" target="_blank" class="stripe-btn">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/stripe.svg" alt="Stripe" class="stripe-icon">
            Go to Stripe
          </a>
          <p style="margin-top:18px;color:#94a3b8;">
            You can donate directly using the Stripe link.<br>
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
    function copyStripe() {
      var link = document.getElementById('stripe-link').textContent;
      if (navigator.clipboard) {
        navigator.clipboard.writeText(link).then(function() {
          alert('Stripe link copied!');
        });
      } else {
        var temp = document.createElement('input');
        document.body.appendChild(temp);
        temp.value = link;
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        alert('Stripe link copied!');
      }
    }
  </script>
</body>
</html>
