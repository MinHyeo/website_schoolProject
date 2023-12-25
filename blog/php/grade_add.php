<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_SESSION['sno'];
    $grade = $_SESSION['grade'];
    $semester = $_SESSION['semester'];

    $sql = "SELECT subject_tbl.code, subject_tbl.grade, subject_tbl.semester
    FROM classes_tbl, subject_tbl
    WHERE classes_tbl.sno = $sno";
    $result = mysqli_query($connect, $sql);
    while ($subjectData = mysqli_fetch_assoc($result)) {
        #$grade학년 $semester학기까지만 반복
        if (($subjectData['grade'] > $grade) || ($subjectData['grade'] == $grade && $subjectData['semester'] > $semester)) continue;

        $code = $subjectData['code'];
        $sgrade = $_POST[$code];
        $sql = "INSERT INTO score_tbl VALUES
        ($sno, $code, '$sgrade')";
        mysqli_query($connect, $sql);
    }
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
    
    echo '<script>window.history.back()</script>';
?>