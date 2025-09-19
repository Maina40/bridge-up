<?php
// Show instructions for M-Pesa payment instead of redirect
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>M-Pesa Donation – Bridge Up</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    @media (max-width: 900px) {
      .panel {
        margin: 12px 0;
        border-radius: 0;
        box-shadow: none;
        padding: 1em;
      }
      .brand {
        flex-direction: row;
        gap: 8px;
      }
      .logo {
        width: 44px !important;
        height: 44px !important;
      }
      .hero-cta {
        flex-direction: column;
        gap: 6px;
        margin-left: 0;
        align-items: flex-start;
      }
      nav.hero-cta a,
      nav.hero-cta .btn-primary {
        width: 100%;
        box-sizing: border-box;
        text-align: left;
        padding-left: 10px;
      }
      .container {
        padding: 0;
      }
      .panel .title {
        font-size: 1.3em;
      }
      .panel .subtitle {
        font-size: 1em;
      }
    }
    @media (min-width: 901px) {
      .panel {
        max-width: 700px;
        margin: 2em auto;
        border-radius: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        padding: 2em;
      }
      .logo {
        width: 56px !important;
        height: 56px !important;
      }
      .panel .title {
        font-size: 2em;
      }
      .panel .subtitle {
        font-size: 1.1em;
      }
    }
    .btn-primary {
      background: linear-gradient(90deg,#ff4b4b,#ff8f4b);
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 0.8em 1.5em;
      cursor: pointer;
      transition: background 0.2s;
      text-decoration: none;
      display: inline-block;
      margin-top: 8px;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg,#ff8f4b,#ff4b4b);
      color: #fff;
    }
    .btn-ghost {
      background: transparent;
      color: #94a3b8;
      border: 1px solid rgba(255,255,255,0.03);
      padding: 8px 12px;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s, border-color 0.2s;
    }
    .btn-ghost.active,
    .btn-ghost:hover {
      color: #ff4b4b;
      border-color: #ff4b4b;
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
        <div class="panel">
          <h2 class="title">Donate via M-Pesa</h2>
          <p class="subtitle">
            To support Bridge Up via M-Pesa, use the following steps:<br><br>
            <strong>Paybill:</strong> <span style="color:#ff4b4b;">(Paybill number or Till)</span><br>
            <strong>Account:</strong> BridgeUp<br>
            <strong>Amount:</strong> Enter your donation amount<br><br>
            After payment, please contact us to confirm your donation.<br>
            <a href="contact.html" class="btn-primary" style="margin-top:12px;">Contact Us</a>
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
</body>
</html>
