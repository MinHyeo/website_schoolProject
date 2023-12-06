<?php
    include 'inc_head.php';

<<<<<<< HEAD
    #include 'ConnectDB.php';
    $connect = mysqli_connect('localhost', 'root');
    $db = mysqli_select_db($connect, 'school_db');
=======
    include 'ConnectDB.php';
>>>>>>> DanielHan0117

    $sno = (int)$_SESSION['sno'];
    
    #2학년 1학기까지의 수업들은 수강한걸로 하고
    #2학년 2학기 수업은 수강신청 페이지에서 신청하기

    #1-1
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100108, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100110, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100111, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100129, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 300129, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 200828, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400506, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401428, 2020, 1)";
    mysqli_query($connect, $sql);
    #1-2
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100030, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100112, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100120, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100128, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 300274, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 200850, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400346, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401429, 2020, 2)";
    mysqli_query($connect, $sql);
    #2-1
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100113, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 400650, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 401154, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 500845, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 501976, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 505511, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 509446, 2023, 1)";
    mysqli_query($connect, $sql);

    /*
    #2-2
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 100114, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 300059, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 500111, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 501100, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 503872, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 505514, 2023, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO classes_tbl VALUES
    ($sno, 509447, 2023, 2)";
    mysqli_query($connect, $sql);
    */
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>