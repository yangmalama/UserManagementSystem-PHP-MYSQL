<?php
// register_process.php
include 'includes/dbcon.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = trim($_POST['email']); // Trim whitespace!
    $email = mysqli_real_escape_string($connection, $email); // Sanitize AFTER trimming
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);


    // Validate (add more robust validation as needed)
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($phone)) {
        echo "All fields are required.";
        exit;
    }

    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Check if email already exists (after trimming)
    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists. Please choose a different email.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (first_name, last_name, email, password, phone) 
                     VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$phone')";

    if (mysqli_query($connection, $insert_query)) {
        header("Location: upload_photo.php?email=$email");
        exit;
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>