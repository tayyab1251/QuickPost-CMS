<?php

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}
?>

<?php require '../includes/header.php'; require '../includes/navbar.php'; require '../request.php';?>

<!-- Main Content -->
<div class="container py-5">
    <div class="row">
        <!-- Blog Post -->
        <div class="col-md-12">

            <?php
                getPostById();
            ?>

        </div>
    </div>

</div>
<?php require '../includes/footer.php'; ?>