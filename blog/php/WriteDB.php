<?php
    #세션 시작
    include 'inc_head.php';
    #DB 접속
    include 'ConnectDB.php';

    #테이블 접속
    $sql = "select *from board_tbl";
    $result = mysqli_query($connect, $sql);
    if($result){
        echo "테이블이 존재합니다<br>";
    }
    else {
        echo "▲ 테이블 선택에 실패했습니다 .... <br><br>";
        exit;
    }

    #레코드 생성
    $size_result = mysqli_query($connect, $sql);
    $size = mysqli_num_rows($size_result);
    $num = $size+1;
    $name = $_SESSION['name'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO board_tbl VALUES
            ('$num', '$name', '$title', '$content', '$date')";
    $result = mysqli_query($connect, $sql);

    mysqli_close($connect);
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../Board.php"';
    echo '</script>';
?>