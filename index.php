<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

include 'includes/dbcon.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $connection->query($sql);
$user = $result->fetch_assoc();

?>
<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <!-- Welcome Section -->
    <h1>Welcome, <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>!</h1>
    <p>This is your homepage. You can navigate using the links above.</p>

    <!-- Features & Image Section -->
    <div class="row align-items-center mt-4">
      <!-- Left Side: Features List -->
      <div class="col-md-6">
        <h4>Features</h4>
        <ul class="list-group">
          <li class="list-group-item">Update your profile</li>
          <li class="list-group-item">View user list (Admin Only)</li>
          <li class="list-group-item">Secure login and logout</li>
        </ul>
      </div>

      <!-- Right Side: Image -->
      <div class="col-md-6 text-center">
        <img src="https://frontegg.com/wp-content/uploads/2022/03/rbac-2.png" 
             alt="User Management" class="img-fluid w-75">
      </div>
    </div>
  </div>

  <?php include("footer.php"); ?>
</body>

</html>