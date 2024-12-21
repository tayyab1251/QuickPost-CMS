<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <?php
        if ($_SERVER['PHP_SELF'] == "/myblog/index.php") {
            echo '<a class="navbar-brand" href="#"><img class="logo" src="./images/QuickPost.webp" alt="QuickPost-logo"></a>';
            
        } else if ($_SERVER['PHP_SELF'] == "/myblog/posts/single-post.php") {
            echo '<a class="navbar-brand" href="#"><img class="logo" src="../images/QuickPost.webp" alt="QuickPost-logo"></a>';
        }
        ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>