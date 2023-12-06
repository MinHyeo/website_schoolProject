<?php
    include 'inc_head.php';

    $_SESSION['grade'] = $_POST['grade'];
    $_SESSION['semester'] = $_POST['semester'];
    
    echo "<script>window.history.back()</script>";
?>