<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_POST['sno'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];
    
    #수강신청 가능한 과목들 중에서 '선택' 버튼을 누르면 해당 과목을 선택 상태로 변경
    if (isset($_POST['select_code'])) {
        $code = $_POST['select_code'];
        $sql = "UPDATE subjectsToRegister_tbl
        SET selected = 1
        WHERE sno = $sno
        AND code = $code";
        mysqli_query($connect, $sql);
        
        $_POST['select_code'] = NULL;
    }
    #수강신청 선택된 과목들 중에서 '해제' 버튼을 누르면 해당 과목을 선택해제 상태로 변경
    if (isset($_POST['unselect_code'])) {
        $code = $_POST['unselect_code'];
        $sql = "UPDATE subjectsToRegister_tbl
        SET selected = 0
        WHERE sno = $sno
        AND code = $code";
        mysqli_query($connect, $sql);
        
        $_POST['unselect_code'] = NULL;
    }

    #'신청' 버튼을 누르면 선택 상태인 과목들을 수강과목 테이블(classes_tbl)에 추가하고 수강신청 테이블에서 제거
    if (isset($_POST['register'])) {
        $sql = "SELECT code
        FROM subjectsToRegister_tbl
        WHERE sno = $sno
        AND selected = 1";
        $result = mysqli_query($connect, $sql);
        while ($subjects = mysqli_fetch_assoc($result)) {
            $code = $subjects['code'];
            $sql = "INSERT INTO classes_tbl VALUES
            ($sno, $code, $grade, $semester)";
            mysqli_query($connect, $sql);

            $sql = "DELETE
            FROM subjectsToRegister_tbl
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
        }

        $_POST['register'] = NULL;

        #방금 신청한 학년과 학기가 시간표 조회 페이지에 자동으로 선택
        $_SESSION['grade'] = $grade;
        $_SESSION['semester'] = $semester;
    }
    
    echo "<script>window.history.back()</script>";
?>