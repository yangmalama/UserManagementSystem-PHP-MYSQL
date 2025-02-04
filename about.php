<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
    <div class="container mt-5">
        <h1>About Us</h1>
        <p>This is a simple user management system built with PHP and MySQL.</p>
        <h5>Our Mission</h5>
                <p>
                    Our mission is to provide a secure, user-friendly, and efficient system for managing user data. 
                    Whether you're an administrator managing multiple users or a regular user updating your profile, 
                    our platform ensures that all interactions are seamless and safe.
                </p>
                <h6>What We Offer</h6>

                <p>
                    - **User Profiles**: Manage your personal information securely.<br>
                    - **Admin Dashboard**: Easily oversee and manage user accounts.<br>
                    - **Security**: Our platform ensures that all data is encrypted and stored safely.<br>
                    - **User-Friendly Interface**: Simple and intuitive design for easy navigation.<br>
                </p>

                <div class="row mt-4">
            <div class="col-md-12">
                <h4>Contact Us</h4>
                <p>If you have any questions or feedback, feel free to reach out to us at <strong>support@usermanagement.com</strong>.</p>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
    
    <?php include("footer.php")?>
</body>
</html>
