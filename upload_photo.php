<?php
session_start();
include 'includes/dbcon.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    header("Location: register.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "images/"; // Directory to store images
    $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual image or fake image
    $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, PNG, JPEG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            // Update the user's profile photo in the database
            $update_query = "UPDATE users SET profile_photo = '$target_file' WHERE email = '$email'";
            if (mysqli_query($connection, $update_query)) {
                // Redirect to login page after successful upload
                header("Location: login.php");
                exit;
            } else {
                echo "Error updating profile photo: " . mysqli_error($connection);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Photo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container mt-4">
        <h2>Upload Your Profile Photo</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="file" class="form-control" name="profile_photo" id="profile_photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>