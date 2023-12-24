<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_SESSION['sno'];
    
    #2학년 1학기까지의 수업들은 수강한걸로 하고
    #2학년 2학기 수업은 수강신청 페이지에서 신청하기

    #1-1
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100108, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100110, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100111, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100129, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 300129, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 200828, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400506, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401428, 1, 1)";
    mysqli_query($connect, $sql);
    #1-2
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100030, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100112, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100120, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100128, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 300274, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 200850, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400346, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401429, 1, 2)";
    mysqli_query($connect, $sql);
    #2-1
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100113, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400650, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401154, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 500845, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 501976, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 505511, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 509446, 2, 1)";
    mysqli_query($connect, $sql);
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>