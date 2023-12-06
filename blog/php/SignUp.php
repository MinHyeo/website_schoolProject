<?php
    #DB접속
    include 'ConnectDB.php';

<<<<<<< HEAD
    #테이블  존재여부 확인 후 없으면 생성
    $sql = "SHOW TABLES LIKE 'student_tbl'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0){
=======
    #student_tbl 생성하는 위치를 create_school_db.php 로 이동
    /*
    #테이블  존재여부 확인 후 없으면 생성
    $sql = "SHOW TABLES LIKE 'student_tbl'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0) {
>>>>>>> DanielHan0117
        echo "테이블이 존재합니다<br>";
    }
    else {
        echo "▲ 테이블이 존재하지 않습니다<br><br>";
<<<<<<< HEAD
        $sql = "create table student_tbl(
            SNO int primary key NOT NULL,
            NAME varchar(20),
            GRADE int,
            password varchar(15) )
            default charset=utf8 ";
        $result = mysqli_query($connect, $sql);
=======
>>>>>>> DanielHan0117
        if($result){
            echo "테이블 생성 완료 <hr>";
        }
        else{
            echo "테이블 생성 실패 <hr>";
            exit;
        }
    }
<<<<<<< HEAD

    #회원가입 정보 불러오기
    $sno = $_POST['classOf'];
=======
    */

    #회원가입 정보 불러오기
    $sno = $_POST['sno'];
>>>>>>> DanielHan0117
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];

    #입력되어 있지 않은 입력란 있는지 확인
<<<<<<< HEAD
    if($sno === "" or $name === "" or $grade === "" or $password === "" or $passwordCheck === ""){
        echo '<script type="text/javascript">';
        echo ' alert("입력란이 비어있습니다!")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
=======
    if($sno === "" or $name === "" or $grade === "" or $password === "" or $passwordCheck === "") {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"입력란이 비어있습니다!\")";
        echo "</script>";

        echo "<script type=\"text/javascript\">";
        echo " history.back()";
        echo "</script>";
>>>>>>> DanielHan0117
        exit;
    }

    #동일한 학번 존재하는지 확인
    #만약 있으면 다시 로그인 화면으로 되돌리기
<<<<<<< HEAD
    $sql = "select *from student_tbl where SNO='$sno'";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0){
        echo '<script type="text/javascript">';
        echo ' alert("계정이 존재하는 학번입니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
=======
    $sql = "SELECT * FROM student_tbl WHERE sno=$sno";
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"계정이 존재하는 학번입니다.\")";
        echo "</script>";

        echo "<script type=\"text/javascript\">";
        echo " history.back()";
        echo "</script>";
>>>>>>> DanielHan0117
        exit;
    }
    
    #비밀번호, 비밀번호 확인 비교
    #만약 틀리면 틀렸다고 알려주고 페이지 돌려보내기
<<<<<<< HEAD
    if(!($password === $passwordCheck)){
        echo '<script type="text/javascript">';
        echo ' alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo ' history.back()';
        echo '</script>';
=======
    if(!($password === $passwordCheck)) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"비밀번호와 비밀번호 확인이 일치하지 않습니다.\")";
        echo "</script>";

        echo "<script type=\"text/javascript\">";
        echo " history.back()";
        echo "</script>";
>>>>>>> DanielHan0117
        exit;
    }

    #만약 이상 없다면 회원가입
    #레코드 삽입
    $sql = "INSERT INTO student_tbl VALUES
<<<<<<< HEAD
            ('$sno', '$name', '$grade', '응용소프트웨어공학과', '$password')";
    $result = mysqli_query($connect, $sql); 

    echo '<script type="text/javascript">';
    echo ' alert("정상적으로 회원가입 되었습니다.")';
    echo '</script>';

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../main.php"';
    echo '</script>';
=======
    ($sno, '$name', $grade, '응용소프트웨어공학과', '$password')";
    mysqli_query($connect, $sql);

    echo "<script type=\"text/javascript\">";
    echo "alert(\"정상적으로 회원가입 되었습니다.\")";
    echo "</script>";

    echo "<script type=\"text/javascript\">";
    echo "window.location.href = \"../main.php\"";
    echo "</script>";
>>>>>>> DanielHan0117

    mysqli_close($connect);
?>