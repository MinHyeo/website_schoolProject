<?php
    include 'inc_head.php';

    $_SESSION['scheduleGrade'] = $_POST['scheduleGrade'];
    $_SESSION['scheduleSemester'] = $_POST['scheduleSemester'];
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
    
    echo '<script>window.history.back()</script>';
?>