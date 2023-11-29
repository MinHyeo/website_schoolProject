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

    #입력받은 값들 저장
    $sno = $_POST['classOf'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];

    if(!($password === $passwordCheck)){
        echo '<script type="text/javascript">';
        echo ' alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
        exit;
    }

    #레코드 삽입
    $sql = "INSERT INTO student_tbl VALUES
            ('$sno', '$name', '$grade', '$password')";
    $result = mysqli_query($connect, $sql);

    mysqli_close($connect);

    echo "<hr>";
?>