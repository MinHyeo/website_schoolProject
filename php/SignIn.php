<?php
    #데이터베이스 존재 확인 및 접속
    $connect = mysqli_connect('localhost', 'root');
    $db = mysqli_select_db($connect, 'school_db');

    $db = mysqli_select_db($connect, 'school_db');

    if($db){
        echo "▲ 데이터베이스 선택에 성공했습니다 .... <br><br>";
    }
    else{
        echo "<hr>";
        echo "▲ 데이터베이스 선택에 실패했습니다 .... <br><br>";
        exit;
    }

    #테이블 선택 or 생성
    $sql = "select *from student_tbl";
    $result = mysqli_query($connect, $sql);
    if($result){
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
    $sql = "select *from student_tbl where SNO='$sno'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows == 1){
        echo "아이디 존재<br>";
    }
    else{
        echo '<script type="text/javascript">';
        echo ' alert("학번 또는 비밀번호가 틀렸습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
        exit;
    }

    #비밀번호가 테이블에 존재하는지 확인
    $sql = "select *from student_tbl where password='$password'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows == 1){
        echo "비밀번호 존재<br>";
    }
    else{
        echo '<script type="text/javascript">';
        echo ' alert("학번 또는 비밀번호가 틀렸습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
        exit;
    }

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../blog/main.html"';
    echo '</script>';
?>