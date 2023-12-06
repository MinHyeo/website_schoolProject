<?php
    include 'php/inc_head.php';
    include 'php/ConnectDB.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link href="css/Board.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .left{
            text-align:left;
        }
        .right{
            text-align:right;
        }
        .center{
            text-align:center;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            text-decoration: underline;
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
        <li><a href="#" class="nav-link px-2">교육과정</a></li>
        <li><a href="#" class="nav-link px-2">성적관리</a></li>
        <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
        <li><a href="registeration.php" class="nav-link px-2">수강신청</a></li>
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
            <div>
                <h1 class="left">자유게시판</h1>
                <hr>
            </div>
            <div>
                <!--데이터베이스에서 게시판 내용 불러서 페이지에 출력-->
                <?PHP
                    echo '<table class="board-table">';
                    $sql = "select *from board_tbl ORDER BY DATE DESC";
                    $result = mysqli_query($connect, $sql);
                    $index = 1;
                    $sql = "select *from board_tbl";
                    echo '<tr>
                        <th class="center">번호</th>
                        <th class="left">제목</th>
                        <th class="center">글쓴이</th>
                        <th class="center">일시</th>
                        </tr>';
                    while($row = mysqli_fetch_array($result)){
                        echo '<tr>
                            <td class="center">'.$row['NUM'].'</td>
                            <td class="left"><a href="read.php?num='.$row['NUM'].'">'.$row['TITLE'].'</a></td>
                            <td class="center">'.$row['NAME'].'</td>
                            <td class="center">'.$row['DATE'].'</td>
                            </tr>';
                        $index = $index + 1;
                    }
                    echo '</table>';
                    mysqli_close($connect);
                ?>
            </div>
            <?php
                echo "<br>";
                if($jb_login){
                    echo '<div class="button">
                    <span><input type="button" class="button-gray" value="글쓰기" onclick="location.href=\'Write.php\'"></span>
                    </div>';
                }
            ?>
        </main>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li><a href="main.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">교육과정</a></li>
            <li><a href="#" class="nav-link px-2">성적관리</a></li>
            <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
            <li><a href="registeration.php" class="nav-link px-2">수강신청</a></li>
            <li><a href="Board.php" class="nav-link px-2">게시판</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 동의대 사이트 제작</p>
        </footer>
    </div>
</body>
</html>