<?php
    echo "<br><h3>회원가입 정보 확인</h3></br>";
    echo "<hr>";

    echo "학번 : {$_POST['classOf']}<br>";
    echo "학년 : {$_POST['grade']}";
    echo "비밀번호 : {$_POST['password']}";
    echo "비밀번호 확인 : {$_POST['passwordCheck']}";

    echo "<hr>";
?>