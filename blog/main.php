<?php
    include 'php/inc_head.php';
?>

<!doctype html>
<html lang="ko" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <title>응용소프트웨어 정보</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">

    <style>
      img.image{
        height: 800px;
        width: 1200px
      }
    </style>
</head>
<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="main.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="Curriculum.php" class="nav-link px-2">교육과정</a></li>
        <li><a href="grade.php" class="nav-link px-2">성적관리</a></li>
        <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
        <li><a href="register.php" class="nav-link px-2">수강신청</a></li>
        <li><a href="Board.php" class="nav-link px-2">게시판</a></li>
      </ul>
      
      <!--로그인을 하면 로그아웃 출력
          로그인이 안되어 있으면 로그인과 회원가입 출력-->
      <?php
        if ( $jb_login ) {
          echo '<div col-md-3 text_end>
          <span>환영합니다 </span><B>'.$_SESSION['name'].'</B><span>님<span>
          <button type="button" class="btn btn-primary" onclick="location.href=\'php/logout.php\'">Logout</button>
        </div>';
        } else {
          echo '<div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2" onclick="location.href=\'../blog/SignIn.html\'">Login</button>
          <button type="button" class="btn btn-primary" onclick="location.href=\'SignUp.html\'">Sign-up</button>
        </div>';
        }
      ?>
      
    </header>
  </div>

  <main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
      <div class="col-lg-6 px-0">
        <img src="../image/Dong.jpg" alt="응용소프트웨어공학과" class="image"><br>
        <h1 class="my-3">응용소프트웨어공학과</h3>
        <p class="lead my-3">미래의 기술전문가 양성을 위하여 남들보다 앞서나가는 교육</p>
        <p class="lead my-3">누구보다 먼저 미래를 준비합니다.</p>
      </div>
    </div>
  </main>

  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="main.php" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="Curriculum.php" class="nav-link px-2 text-body-secondary">교육과정</a></li>
        <li class="nav-item"><a href="grade.php" class="nav-link px-2 text-body-secondary">성적관리</a></li>
        <li class="nav-item"><a href="schedule.php" class="nav-link px-2 text-body-secondary">시간표조회</a></li>
        <li class="nav-item"><a href="register.php" class="nav-link px-2 text-body-secondary">수강신청</a></li>
        <li class="nav-item"><a href="Board.php" class="nav-link px-2 text-body-secondary">게시판</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2023 동의대 사이트 제작</p>
    </footer>
  </div>
</body>
</html>
