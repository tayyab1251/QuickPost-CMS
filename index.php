<?php

require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/hero.php';
require 'request.php';
?>

<!-- Main Content -->
<div class="container py-5">
    <div class="row">
        <!-- Blog Posts -->
        <div class="col-md-8">

            <?php getAllPosts() ?>

            <!-- Pagination -->
            <?php require 'includes/pagination.php'; ?>

        </div>

        <!-- Sidebar -->
        <?php require 'includes/sidebar.php'; ?>

    </div>

    <!-- Comment Box -->
    <?php require 'includes/comments.php'; ?>

</div>

<!-- Scroll to Top -->
<button id="scrollToTopBtn" class="btn btn-primary">
    <i class="ri-arrow-up-line"></i>
</button>

<?php require 'includes/footer.php'; ?>

<script src="script.js"></script>