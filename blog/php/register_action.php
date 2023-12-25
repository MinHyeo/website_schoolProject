<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_SESSION['sno'];
    $registerGrade = $_POST['registerGrade'];
    $registerSemester = $_POST['registerSemester'];
    
    #수강신청 가능한 과목들 중에서 '선택' 버튼을 누르면 해당 과목을 선택 상태로 변경
    if (isset($_POST['select_code'])) {
        $code = $_POST['select_code'];

        $sql = "UPDATE register_tbl
        SET selected = 1
        WHERE sno = $sno
        AND code = $code";
        mysqli_query($connect, $sql);
    }
    #수강신청 선택된 과목들 중에서 '해제' 버튼을 누르면 해당 과목을 선택해제 상태로 변경
    if (isset($_POST['unselect_code'])) {
        $code = $_POST['unselect_code'];

        $sql = "UPDATE register_tbl
        SET selected = 0
        WHERE sno = $sno
        AND code = $code";
        mysqli_query($connect, $sql);
    }

    #'신청' 버튼을 누르면 선택 상태인 과목들을 수강과목 테이블(classes_tbl)에 추가하고 수강신청 테이블에서 제거
    if (isset($_POST['register'])) {
        $sql = "SELECT code
        FROM register_tbl
        WHERE sno = $sno
        AND selected = 1";
        $result = mysqli_query($connect, $sql);

        while ($subjectData = mysqli_fetch_assoc($result)) {
            $code = $subjectData['code'];
            
            $sql = "INSERT INTO classes_tbl VALUES
            ($sno, $code)";
            mysqli_query($connect, $sql);

            $sql = "DELETE
            FROM register_tbl
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
        }

        #방금 신청한 학년과 학기가 시간표 조회 페이지에 자동으로 선택
        $_SESSION['scheduleGrade'] = $registerGrade;
        $_SESSION['scheduleSemester'] = $registerSemester;
    }
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
    
    echo '<script>window.history.back()</script>';
?>