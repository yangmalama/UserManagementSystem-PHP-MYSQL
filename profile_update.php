<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'includes/dbcon.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

mysqli_close($connection);
?>
<?php include("header.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="d-flex flex-column min-vh-100">
    <main class="container flex-grow-1 mt-1">

        <h3 class="text-center">Update Profile</h3>
        <form action="profile_update_process.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 profile-picture-container text-center">
                <img src="<?php echo $row['profile_photo'] ? $row['profile_photo'] : 'images/default_profile.jpg'; ?>"
                    alt="Profile Photo" class="profile-image small-image mt-2">
                <!-- <label for="profile_photo" class="form-label">Profile Photo</label> -->
                <!-- <input type="file" class="form-control" name="profile_photo" id="profile_photo"><i class="fas fa-edit"></i> -->
                <!-- <form action="" method="POST" enctype="multipart/form-data" class="d-inline"> -->
                    <input type="file" id="profile_picture" name="profile_picture" class="d-none" accept="image/*">
                    <label for="profile_picture" class="edit-button edit-overlay btn btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                    </label>
                    <button type="submit" name="upload_picture" class="d-none">Upload</button>
                <!-- </form> -->
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="<?php echo $row['first_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <!-- <button type="submit" class="btn btn-dark">Back</button> --><button type="button" class="btn btn-dark"
                onclick="history.back();">Back</button>


        </form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <<footer class="bg-dark text-white text-center py-2 sticky-bottom">
    &copy; 2025 User Management-Yangma. All Rights Reserved.
</footer>
</body>

</html>