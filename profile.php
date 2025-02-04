<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
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
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/lucide@latest/dist/lucide-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container d-flex flex-column align-items-center text-center py-5">
    <div class="col-md-6">
        <h2 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h2>
        
        <div class="mb-4">
            <img 
                src="<?php echo htmlspecialchars($row['profile_photo'] ? $row['profile_photo'] : 'images/default_profile.jpg'); ?>" 
                alt="Profile Photo" 
                class="profile-image rounded-circle shadow-lg" 
                style="width: 200px; height: 200px; object-fit: cover;"
            >
        </div>

        <div class="card" >
            <div class="card-body">
                <p class="card-text"><strong>First Name:</strong> <?php echo htmlspecialchars($row['first_name']); ?></p>
                <p class="card-text"><strong>Last Name:</strong> <?php echo htmlspecialchars($row['last_name']); ?></p>
                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
            </div>
        </div>

        <div class="mt-4">
            <a href="profile_update.php" class="btn btn-primary ">
                <i class="fas fa-edit me-2"></i>Edit Profile
            </a>
        </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest/dist/lucide.min.js"></script>
    <script>
      lucide.icons.forEach(icon => {
        lucide.createIcons(icon)
      })
    </script>
     <?php include("footer.php")?>
</body>
</html>