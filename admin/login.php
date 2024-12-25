<?php

session_start();
require '../db-config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get the form data
    $userName = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];
    // username
    if (empty($userName)) {
        echo 'Username is required';
        exit();
    }
    // password
    if (empty($password)) {
        echo 'Password is required';
        exit();
    }
    // Check user register
    $user = "SELECT * FROM `users` WHERE username = '$userName'";
    $result = mysqli_query($conn, $user);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['user_password'];

        if (password_verify($password, $storedPassword)) {
            $_SESSION['loginStatus'] = true;
            $_SESSION['userId'] = $row['user_id'];

            echo '<script>alert("Successfully logged in");</script>';
            echo '<script>window.open("index.php", "_self");</script>';
        } else {
            echo '<script>alert("Invalid credentials");</script>';
        }
    } else {
        echo '<script>alert("Invalid credentials");</script>';
    }

    mysqli_close($conn);
}

?>


<?php
require 'includes/header.php';
require 'includes/links.php';
?>

<!-- Registration Form -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-4 bg-white p-4 rounded shadow-sm">
        <h2 class="text-center mb-4" style="color: var(--primary-color);">Login</h2>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <!-- Full Name -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
            </div>

            <!-- Register Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
        </form>

        <!-- register Link -->
        <p class="mt-3 text-center">Not registered ? <a href="register.php" style="color: var(--primary-color);">Register here</a></p>
    </div>
</div>

<?php require 'includes/footer.php'; ?>