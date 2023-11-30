<?php
    echo "<br><h3>회원가입 정보 확인</h3></br>";
    echo "<hr>";

    #데이터베이스 존재 확인 및 접속
    $connect = mysqli_connect('localhost', 'root');
    $db = mysqli_select_db($connect, 'school_db');

    if($db){
        echo "▲ 데이터베이스 선택에 성공했습니다 .... <br><br>";
    }
    else{
        echo "<hr>";
        echo "▲ 데이터베이스 선택에 실패했습니다 .... <br><br>";
        exit;
    }

    #테이블  존재여부 확인 후 없으면 생성
    $sql = "SHOW TABLES LIKE 'student_tbl'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0){
        echo "테이블이 존재합니다<br>";
    }
    else {
        echo "▲ 테이블이 존재하지 않습니다<br><br>";
        $sql = "create table student_tbl(
            SNO int primary key NOT NULL,
            NAME varchar(20),
            GRADE int,
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
    $sno = $_POST['classOf'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];

    #동일한 학번 존재하는지 확인
    #만약 있으면 다시 로그인 화면으로 되돌리기
    $sql = "select *from student_tbl where SNO='$sno'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0){
        echo '<script type="text/javascript">';
        echo ' alert("계정이 존재하는 학번입니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
        exit;
    }
    
    #비밀번호, 비밀번호 확인 비교
    #만약 틀리면 틀렸다고 알려주고 페이지 돌려보내기
    if(!($password === $passwordCheck)){
        echo '<script type="text/javascript">';
        echo ' alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
        exit;
    }

    #만약 이상 없다면 회원가입
    #레코드 삽입
    $sql = "INSERT INTO student_tbl VALUES
            ('$sno', '$name', '$grade', '$password')";
    $result = mysqli_query($connect, $sql); 

    echo '<script type="text/javascript">';
    echo ' alert("정상적으로 회원가입 되었습니다.")';
    echo '</script>';

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../blog/main.html"';
    echo '</script>';

    mysqli_close($connect);
?>