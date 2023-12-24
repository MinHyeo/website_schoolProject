<?php
    include 'inc_head.php';
    include 'ConnectDB.php';
    
    $sno = $_SESSION['sno'];
    
    $deleteSql = "DELETE FROM score_tbl WHERE sno = $sno";
    mysqli_query($connect, $deleteSql);
    
    echo "<script>window.history.back()</script>";
?>