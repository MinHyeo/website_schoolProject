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
</head>
<body>
  <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
          </div>
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="main.php" class="nav-link px-2">Home</a></li>
              <li><a href="Curriculum.php" class="nav-link px-2">교육과정</a></li>
              <li><a href="grade.php" class="nav-link px-2">성적관리</a></li>
              <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
              <li><a href="register.php" class="nav-link px-2">수강신청</a></li>
              <li><a href="Board.php" class="nav-link px-2">게시판</a></li>
          </ul>
          
          <!--로그인을 하면 로그아웃 출력
              로그인이 안되어 있으면 로그인과 회원가입 출력-->
          <?php
              if ($jb_login) {
                  echo '<div col-md-3 text_end>
                  환영합니다 <B>'.$_SESSION['name'].'</B>님
                  <button type="button" class="btn btn-primary" onclick="location.href=\'php/logout.php\'">Logout</button>
                  </div>';
              }
              else {
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
        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-body-emphasis fw-bold">Continue reading...</a></p>
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-body-secondary">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
              Continue reading
              <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-body-secondary">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
              Continue reading
              <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          </div>
        </div>
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
