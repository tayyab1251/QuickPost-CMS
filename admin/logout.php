<?php 

session_start();
require './includes/header.php';  
session_destroy();
session_unset();

header("Location: ../index.php");
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>


<?php include './includes/footer.php'; ?>
