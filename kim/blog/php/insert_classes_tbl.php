<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_SESSION['sno'];
    $grade = $_SESSION['grade'];
    $semester = $_SESSION['semester'];
    
    #2학년 1학기까지의 수업들은 수강한걸로 하고
    #2학년 2학기 수업은 수강신청 페이지에서 신청하기
    
    #1~4학년
    for ($i = 1; $i <= 4; $i++) {
        #1~2학기
        for ($j = 1; $j <= 2; $j++) {
            #$grade학년 $semester학기까지만 반복
            if (($i > $grade) || ($i == $grade && $j > $semester)) break;

            $sql = "SELECT code
            FROM subject_tbl
            WHERE grade = $i
            AND semester = $j";
            $result = mysqli_query($connect, $sql);

            while ($subjectData = mysqli_fetch_assoc($result)) {
                $code = $subjectData['code'];

                $sql = "INSERT INTO classes_tbl VALUES
                ($sno, $code)";
                mysqli_query($connect, $sql);
            }
        }
    }
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>