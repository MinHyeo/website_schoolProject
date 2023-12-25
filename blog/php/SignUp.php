<?php
    #DB접속
    include 'ConnectDB.php';

    #테이블 존재 확인
    $sql = "SHOW TABLES LIKE 'student_tbl'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0){
        echo "테이블이 존재합니다<br>";
    }
    else {
        echo "▲ 테이블이 존재하지 않습니다<br><br>";
        $sql = "create table student_tbl(
            sno int primary key NOT NULL,
            name varchar(20),
            major varchar(20),
            grade INT,
            semester int,
            password varchar(15) )
            default charset=utf8 ";
        $result = mysqli_query($connect, $sql);
        if($result){
            echo "테이블 생성 완료 <hr>";
        }
        else{
            echo "테이블 생성 실패 <hr>";
            exit;
        }
    }
    
    #회원가입 정보 불러오기
    $sno = $_POST['sno'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];

    #입력되어 있지 않은 입력란 있는지 확인
    if($sno === "" or $name === "" or $password === "" or $passwordCheck === "") {
        echo '<script type="text/javascript">';
        echo 'alert("입력란이 비어있습니다!")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo 'history.back()';
        echo '</script>';
        exit;
    }

    #동일한 학번 존재하는지 확인
    #만약 있으면 다시 로그인 화면으로 되돌리기
    $sql = "SELECT * FROM student_tbl WHERE sno=$sno";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("계정이 존재하는 학번입니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo 'history.back()';
        echo '</script>';
        exit;
    }
    
    #비밀번호, 비밀번호 확인 비교
    #만약 틀리면 틀렸다고 알려주고 페이지 돌려보내기
    if(!($password === $passwordCheck)) {
        echo '<script type="text/javascript">';
        echo 'alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo 'history.back()';
        echo '</script>';
        exit;
    }

    #만약 이상 없다면 회원가입
    #레코드 삽입
    $sql = "INSERT INTO student_tbl VALUES
    ($sno, '$name', '응용소프트웨어공학과', $grade, $semester, '$password')";
    mysqli_query($connect, $sql);
    
    
    #학생의 학년, 학기 까지의 수업을 들은 것으로 함    
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

    echo '<script type="text/javascript">';
    echo 'alert("정상적으로 회원가입 되었습니다.")';
    echo '</script>';
    
    if (is_resource($connect)) {
        mysqli_close($connect);
    }

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../main.php"';
    echo '</script>';
?>