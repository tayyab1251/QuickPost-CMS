<?php

require '../db-config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Get the form data
    $userName = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // validate username
    if (empty($userName)) {
        echo 'Username is required';
        exit();
    }

    // email
    if (empty($email)) {
        echo 'Email is required';
        exit();
    }

    // password
    if (empty($password)) {
        echo 'Password is required';
        exit();
    }

    // File uploading
    $profile = $_FILES['profile_picture']['name'];
    $imgType = $_FILES['profile_picture']['type'];
    $tmpName = $_FILES['profile_picture']['tmp_name'];
    $folder = __DIR__ . DIRECTORY_SEPARATOR . "profile_images" . DIRECTORY_SEPARATOR . $profile;

    // Size check 
    $maxSize = 2 * 1024 * 1024;
    if ($_FILES['profile_picture']['size'] > $maxSize) {
        echo 'Image must be less than 2MB';
        exit();
    }

    // Type check
    $allowedTypes = ['image/jpeg', 'image/png'];

    if (!in_array($imgType, $allowedTypes)) {
        echo 'Only JPEG and PNG fromat is allowed';
        exit();
    }

    // Upload check
    if (move_uploaded_file($tmpName, $folder)) {
        if ($conn) {
            //check user already exist or not
            $registered = "SELECT * FROM `users` WHERE username = '$userName' AND user_email = '$email'";
            $results = mysqli_query($conn, $registered);
            
            if (mysqli_num_rows($results) > 0) {
                echo '<script>alert("User already registered, Please login");</script>';
                echo '<script>window.open("login.php" , "_self");</script>';
            } else {
                $insert = "INSERT INTO `users` (username , user_email , user_password , user_image) VALUES ('$userName' , '$email' , '$hashedPassword' , '$profile')";

                if (mysqli_query($conn, $insert)) {
                    echo '<script>alert("New user hasbeen registered successfully");</script>';
                    echo '<script>window.open("login.php" , "_self");</script>';
                }
            }
        }
    } else {
        die("Failed to upload image !");
    }
}
?>

<?php

require 'includes/header.php';
require 'includes/links.php';
?>

<!-- Registration Form -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-4 bg-white p-4 rounded shadow-sm">
        <h2 class="text-center mb-4" style="color: var(--primary-color);">Register</h2>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <!-- Full Name -->
            <div class="mb-3">
                <label for="username" class="form-label">Full Name</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
            </div>

            <!-- Profile Picture Upload -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" class="form-control" accept="image/jpeg, image/png, image/gif">
            </div>

            <!-- Register Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Register</button>
            </div>
        </form>

        <!-- Login Link -->
        <p class="mt-3 text-center">Already registered ? <a href="login.php" style="color: var(--primary-color);">Login here</a></p>
    </div>
</div>

<?php require 'includes/footer.php'; ?>