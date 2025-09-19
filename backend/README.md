# Recommended Backend for Bridge Up Project

- **PHP**: Your current setup uses PHP, which is suitable for handling forms, payments, and simple APIs.
- **File Storage**: For images and uploads, use the filesystem (e.g., `images/events/`).
- **Email**: Use PHP's `mail()` function or integrate with services like SMTP, SendGrid, or Mailgun for reliable email delivery.
- **Security**: Validate all user input and restrict file uploads.

**Stack Example:**
- PHP (backend logic)
- Apache or Nginx (web server)
- Optional: Use frameworks like Laravel for advanced features

**Note:**  
Currently, your project does not use a database.  
All data (e.g., feedback, images) is stored in files (like JSON or image folders).

---

## What should you do next?

1. **Decide if you need a database:**
   - If you want user accounts, donation tracking, or dynamic feedback, set up MySQL/MariaDB using the provided SQL schema.

2. **Connect your PHP code to the database:**
   - Update your PHP scripts to use database queries for storing/retrieving data.

3. **Secure your backend:**
   - Validate all user input.
   - Use prepared statements for database queries.
   - Restrict file uploads and access.

4. **Test all features:**
   - Try forms, uploads, and feedback to ensure everything works.

5. **Deploy and maintain:**
   - Keep your code updated.
   - Regularly back up your files and database.

**Tip:**  
If you want to add database features, import the SQL file into your MySQL server and update your PHP code to use it.

# Troubleshooting "Page not found" (404 error)

If you see a "Page not found" error like the screenshot, here are possible causes and solutions:

1. **You are hosting on Netlify or a static host:**  
   - Netlify does not support PHP or server-side code.  
   - PHP files (like contact.php, upload_photo.php) will not run on Netlify.

2. **Solution:**  
   - Host your project on a PHP-enabled server (e.g., cPanel hosting, 000webhost, InfinityFree, XAMPP locally).
   - If you need PHP, do **not** use Netlify, Vercel, or other static-only hosts.

3. **How to fix:**  
   - Move your files to a PHP-capable host.
   - Make sure your URLs point to `.php` files (e.g., `/backend/contact.php`).
   - Test your site at `http://yourdomain.com` or `http://localhost/bridge_up/` (if using XAMPP).

**Summary:**  
- Netlify is for static sites (HTML, CSS, JS only).
- Use a PHP host for backend features.

# Where is the PHP config file?

For database connections in PHP, you typically create a config file such as:

- `c:\xampp\htdocs\bridge_up\backend\db.php`

This file contains your database connection settings (host, username, password, database name), for example:

```php
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bridgeup';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

**Usage:**  
Include this file at the top of any PHP script that needs to access the database:

```php
require 'backend/db.php';
```
