<?php
    include 'inc_head.php';

    if ( $jb_login ) {
        session_destroy();
        echo '<script type="text/javascript">';
        echo ' alert("정상적으로 로그아웃 되었습니다.")';
        echo '</script>';

        echo '<script type="text/javascript">';
        echo 'window.location.href = "../main.php"';
        echo '</script>';
      } else {
        echo '<h1>로그인 상태가 아닙니다.</h1>';
      }
?>