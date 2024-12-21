<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

<!-- Remix Icon CSS -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Custom CSS -->
<!-- For blog post -->
<!-- <link rel="stylesheet" href="../includes/style.css"> -->

<?php

if ($_SERVER['PHP_SELF'] == "/myblog/index.php") {
    echo '<link rel="stylesheet" href="includes/style.css">';
}else if($_SERVER['PHP_SELF'] == "/myblog/posts/single-post.php"){
    echo '<link rel="stylesheet" href="../includes/style.css">';
}
?>

