<?php
    #세션 시작
    include 'inc_head.php';
    #DB 접속
    include 'ConnectDB.php';

    #테이블 선택 or 생성
    $sql = "SELECT * FROM student_tbl";
    $result = mysqli_query($connect, $sql);
    if($result) {
        echo "테이블이 존재합니다<br>";
    }
    else {
        echo "▲ 테이블 선택에 실패했습니다 .... <br><br>";
        exit;
    }

    #로그인 정보 불러오기
    $sno = $_POST['classOf'];
    $password = $_POST['password'];

    #학번이 테이블에 존재하는지 확인
    $sql = "SELECT * FROM student_tbl WHERE sno=$sno AND password='$password'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows == 1) {
        echo "아이디 존재<br>";
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("학번 또는 비밀번호가 틀렸습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo 'history.back()';
        echo '</script>';
        exit;
    }

    $sql = "SELECT name, grade, semester FROM student_tbl WHERE sno=$sno";
    $result = mysqli_query($connect, $sql);
    $studentData = mysqli_fetch_assoc($result);
    $name = $studentData['name'];
    $grade = $studentData['grade'];
    $semester = $studentData['semester'];

    $_SESSION['sno'] = $sno;
    $_SESSION['password'] = $password;
    $_SESSION['name'] = $name;
    $_SESSION['grade'] = $grade;
    $_SESSION['semester'] = $semester;
    
    if (is_resource($connect)) {
        mysqli_close($connect);
    }
    
    echo "<script type=\"text/javascript\">";
    echo "window.location.href=\"../main.php\"";
    echo "</script>";
?>