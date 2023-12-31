<?php
    include 'php/inc_head.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Board.css">
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
            <button type="button" class="btn btn-outline-primary me-2" onclick="location.href=\'SignIn.html\'">Login</button>
            <button type="button" class="btn btn-primary" onclick="location.href=\'SignUp.html\'">Sign-up</button>
        </div>';
        }
        ?>
        
    </header>
    </div>

    <div class="form-board m-auto">
        <main>
            <div id="board_write">
                <div>
                    <h1 class="left">글쓰기</h1>
                    <hr>
                </div>
                <div class=".board-write">
                    <form action="php/WriteDB.php" method="post">
                        <div class="in-title">
                            <textarea name="title" placeholder="제목" maxlength="100" required></textarea>
                        </div>
    
                        <div class="wi_line"></div>
                        <div class="in_content">
                            <textarea name="content" placeholder="내용" required></textarea>
                        </div>
    
                        <div>
                            <input type="submit" class="button-gray" value="글 작성">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li><a href="main.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="Curriculum.php" class="nav-link px-2">교육과정</a></li>
            <li><a href="grade.php" class="nav-link px-2">성적관리</a></li>
            <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
            <li><a href="register.php" class="nav-link px-2">수강신청</a></li>
            <li><a href="Board.php" class="nav-link px-2">게시판</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 동의대 사이트 제작</p>
        </footer>
    </div>
</body>
</html>