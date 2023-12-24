<?php
    include 'php/inc_head.php';
?>

<!DOCTYPE html>
<html lang="ko" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Curriculum</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <style>
        #Curri {
            margin: 30px 0 0 150px;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
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
          <button type="button" class="btn btn-outline-primary me-2" onclick="location.href=\'../blog/SignIn.html\'">Login</button>
          <button type="button" class="btn btn-primary" onclick="location.href=\'SignUp.html\'">Sign-up</button>
        </div>';
        }
      ?>
      
    </header>
  </div>
  
  <main>
    <div>
        <h3>커리큘럼</h3>
    </div>
    <div>
        <form method="post">
            <select name="selectedYear">
                <option value="1" <?php if(isset($_POST['selectedYear']) && $_POST['selectedYear'] == '1') echo 'selected'; ?>>1학년</option>
                <option value="2" <?php if(isset($_POST['selectedYear']) && $_POST['selectedYear'] == '2') echo 'selected'; ?>>2학년</option>
                <option value="3" <?php if(isset($_POST['selectedYear']) && $_POST['selectedYear'] == '3') echo 'selected'; ?>>3학년</option>
                <option value="4" <?php if(isset($_POST['selectedYear']) && $_POST['selectedYear'] == '4') echo 'selected'; ?>>4학년</option>
            </select>
            <input type="submit" value="검색">
        </form>
    </div>
    <div id="Curri">
        <table border="1">
            <tr>
                <th colspan="2">학년/학기</th>
                <td>교과목 번호</td>
                <td>교과목명</td>
                <td>학점</td>
                <td>시간</td>
            </tr>

            <?php
            $db_host = "localhost";
            $db_user = "root";
            $db_passwd = "";
            $db_name = "school_db";

            $connect = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);
            $db = mysqli_select_db($connect, $db_name);

            mysqli_query($connect, "set session character_set_connection=utf8");
            mysqli_query($connect, "set session character_set_results=utf8");
            mysqli_query($connect, "set session character_set_client=utf8");
            
            // POST 데이터를 통해 선택한 학년 받기
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $selectedYear = mysqli_real_escape_string($connect, $_POST['selectedYear']);

                // 학년에 따라 적절한 쿼리 작성
                $query = "SELECT * FROM subject_tbl WHERE year = $selectedYear";
                $result = mysqli_query($connect, $query);
                
                if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    echo "<tr>";
                    echo "<td rowspan='14'>" . $row['year'] . "학년</td>";
                    for($i = 1; $i < 3; $i++){
                        echo "<td rowspan='7'>" .$i."학기</td>";
                        while($row){
                            if($row['year'] == $selectedYear && $row['semester'] == $i){
                                echo "<td>" . $row['code'] . "</td>";
                                echo "<td>" . $row['subject_name'] . "</td>";
                                echo "<td>" . $row['credit'] . "</td>";
                                echo "<td>" . $row['time'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                            }
                            $row = mysqli_fetch_assoc($result);
                        }
                        mysqli_data_seek($result, 0);
                        $row = mysqli_fetch_assoc($result);
                    }
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='6'>해당 학년의 데이터가 없습니다.</td></tr>";
                }
            }

            mysqli_close($connect);
            ?>

        </table>
    </div>
  </main>
  
  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="main.php" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">교육과정</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">성적관리</a></li>
        <li class="nav-item"><a href="schedule.php" class="nav-link px-2 text-body-secondary">시간표조회</a></li>
        <li class="nav-item"><a href="registeration.php" class="nav-link px-2 text-body-secondary">수강신청</a></li>
        <li class="nav-item"><a href="Board.php" class="nav-link px-2 text-body-secondary">게시판</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2023 동의대 사이트 제작</p>
    </footer>
  </div>
</body>
</html>