<?php error_reporting(0);
    include 'php/inc_head.php';
    include 'php/ConnectDB.php';
?>

<!DOCTYPE html>
<html lang="ko" data-bs-theme="auto">
<head>
    <title>커리큘럼 조회</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Curriculum.css">
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
    <div id="title">
        <h3>커리큘럼</h3>
    </div>
    <div id="grade_selecter">
        <form method="post">
            <select name="selectedGrade">
                <option value="1" <?php if(isset($_POST['selectedGrade']) && $_POST['selectedGrade'] == '1') echo 'selected'; ?>>1학년</option>
                <option value="2" <?php if(isset($_POST['selectedGrade']) && $_POST['selectedGrade'] == '2') echo 'selected'; ?>>2학년</option>
                <option value="3" <?php if(isset($_POST['selectedGrade']) && $_POST['selectedGrade'] == '3') echo 'selected'; ?>>3학년</option>
                <option value="4" <?php if(isset($_POST['selectedGrade']) && $_POST['selectedGrade'] == '4') echo 'selected'; ?>>4학년</option>
            </select>
            <input type="submit" value="검색">
        </form>
    </div>
    <div id="table_position">
        <table border="1" id="curri_table">
            <tr id="table_header">
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
                $selectedGrade = mysqli_real_escape_string($connect, $_POST['selectedGrade']);

                // 학년에 따라 적절한 쿼리 작성
                $query = "SELECT * FROM subject_tbl WHERE grade = $selectedGrade";
                $result = mysqli_query($connect, $query);
                
                if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    echo "<tr>";
                    echo "<td rowspan='14' id='table_grade'>" . $row['grade'] . "학년</td>";
                    for($i = 1; $i < 3; $i++){
                        echo "<td rowspan='7' id='table_semester'>" .$i."학기</td>";
                        while($row){
                            if($row['grade'] == $selectedGrade && $row['semester'] == $i){
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