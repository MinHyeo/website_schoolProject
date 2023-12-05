<?php
    include '../php/inc_head.php'
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="css/Board.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <style>
        .left {
            text-align :left;
        }
        .right {
            text-align :right;
        }
        .center {
            text-align :center;
        }
    </style>
</head>

<body>
    <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../php/main.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">교육과정</a></li>
        <li><a href="#" class="nav-link px-2">성적관리</a></li>
        <li><a href="#" class="nav-link px-2">시간표조회</a></li>
        <li><a href="../blog/Borad.php" class="nav-link px-2">게시판</a></li>
        </ul>
        
        <!--로그인을 하면 로그아웃 출력
            로그인이 안되어 있으면 로그인과 회원가입 출력-->
        <?php
            if ($jb_login) {
                echo "<div col-md-3 text_end>
                <span>환영합니다 <B>".$_SESSION['name']."</B>님</span>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href=\"logout.php\"\">Logout</button>
                </div>";
            }
            else {
                echo "<div class=\"col-md-3 text-end\">
                <button type=\"button\" class=\"btn btn-outline-primary me-2\" onclick=\"location.href=\"../blog/SignIn.html\"\">Login</button>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href=\"../blog/SignUp.html\"\">Sign-up</button>
                </div>";
            }
        ?>        
    </header>
    </div>

    <div class="form-board m-auto">
        <main>
            <div>
                <h1 style="text-align: left">자유게시판</h1>
                <hr>
            </div>
            <div>
                <table class="board-table">
                    <tr>
                        <th class="center">번호</th>
                        <th class="left">제목</th>
                        <th class="center">글쓴이</th>
                        <th class="center">일시</th>
                    </tr>
                    <tr>
                        <td class="center">1</td>
                        <td class="left">게시글 1 입니다.</td>
                        <td class="center">유민형</td>
                        <td class="center">2023-12-04</td>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td class="left">게시글 2 입니다.</td>
                        <td class="center">유민형</td>
                        <td class="center">2023-12-04</td>
                    </tr>
                </table>
            </div>
            <div class="page">
                <span><a href="#!">◀ 이전</a></span>
                <span><a href="#!">1</a></span>
                <span><a href="#!">다음 ▶</a></span>
            </div>
            <div class="button">
                <span><input type="button" class="button-black" value="글쓰기"></span>
            </div>
        </main>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">교육과정</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">성적관리</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">시간표조회</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">게시판</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 동의대 사이트 제작</p>
        </footer>
    </div>
</body>
</html>