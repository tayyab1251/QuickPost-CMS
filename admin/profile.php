<?php 

session_start();
if(!isset($_SESSION['loginStatus'])){
    header("Location: login.php");
    exit();
}
require './includes/header.php';  


if(isset($_GET['edit']) && $_GET['edit'] == true && isset($_GET['id'])){
    // echo "edit is true and id is set";
    $id = $_GET['id'];
    echo $id;
}
else {
    echo "both are not set";
}
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<div class="container py-5">
    <h3>Edit Profile</h3>
    <!-- Form for editing user profile -->
    <form action="update_profile.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="Dummy User">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="dummyuser@example.com">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<?php include './includes/footer.php'; ?>
