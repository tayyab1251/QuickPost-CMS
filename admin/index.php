<?php 

require './includes/header.php'; 
require './includes/navbar.php'; ?>

<!-- Main Dashboard Content -->
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <?php require './includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Profile Overview Card -->
            <?php require './includes/profile.php'; ?>

            <!-- Users Table Card -->
            <?php require './includes/users.php'; ?>
        </div>
    </div>
</div>

<?php require './includes/footer.php'; ?>
