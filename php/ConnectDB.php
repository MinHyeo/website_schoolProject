<?php
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
?>