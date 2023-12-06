<?php error_reporting(0);
    include 'php/inc_head.php';
    include 'php/ConnectDB.php';

    if (!isset($_SESSION['sno'])) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"로그인을 해주세요.\")";
        echo "</script>";
        echo "<script>window.history.back()</script>";
        exit;
    }
    $sno = $_SESSION['sno'];

    $year = 2023;
    $semester = 2;
    
    #수강신청 테이블(subjectcsToRegister_tbl)에 $sno 학번이 있는지 확인해서 $sno 학생이 수강신청 페이지에 처음 들어왔는지 확인
    $sql = "SELECT *
    FROM subjectsToRegister_tbl
    WHERE sno=$sno";
    $result = mysqli_query($connect, $sql);

    #수강신청 페이지에 $sno 학생이 처음 들어왔다면 아직 듣지 않은 과목들을 출력
    if ($result->num_rows == 0) {
        $sql = "SELECT subject_tbl.code
        FROM subject_tbl
        WHERE subject_tbl.code NOT IN (
        SELECT classes_tbl.code
        FROM classes_tbl
        WHERE classes_tbl.sno = $sno)";
        $result = mysqli_query($connect, $sql);

        while ($subjects = mysqli_fetch_assoc($result)) {
            $code = $subjects['code'];
            $sql = "INSERT INTO subjectsToRegister_tbl VALUES
            ($sno, $code, 0)";
            mysqli_query($connect, $sql);
        }
    }
    else {
        #수강신청 가능한 과목들 중에서 '선택' 버튼을 누르면 해당 과목을 선택 상태로 변경
        if ($_POST['select_code']) {
            $code = $_POST['select_code'];
            $sql = "UPDATE subjectsToRegister_tbl
            SET selected = 1
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
            
            $_POST['select_code'] = NULL;
        }
        #수강신청 선택된 과목들 중에서 '해제' 버튼을 누르면 해당 과목을 선택해제 상태로 변경
        if ($_POST['unselect_code']) {
            $code = $_POST['unselect_code'];
            $sql = "UPDATE subjectsToRegister_tbl
            SET selected = 0
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
            
            $_POST['unselect_code'] = NULL;
        }

        #'신청' 버튼을 누르면 선택 상태인 과목들을 수강과목 테이블(classes_tbl)에 추가하고 수강신청 테이블에서 제거
        if ($_POST['register']) {
            $sql = "SELECT code
            FROM subjectsToRegister_tbl
            WHERE sno = $sno
            AND selected = 1";
            $result = mysqli_query($connect, $sql);
            while ($subjects = mysqli_fetch_assoc($result)) {
                $code = $subjects['code'];
                $sql = "INSERT INTO classes_tbl VALUES
                ($sno, $code, $year, $semester)";
                mysqli_query($connect, $sql);

                $sql = "DELETE
                FROM subjectsToRegister_tbl
                WHERE sno = $sno
                AND code = $code";
                mysqli_query($connect, $sql);
            }

            $_POST['register'] = NULL;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>수강 신청</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registeration.css">
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
                if ($jb_login) {
                echo "<div col-md-3 text_end>
                <span>환영합니다 <B>".$_SESSION['name']."</B>님</span>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='php/logout.php'\">Logout</button>
                </div>";
                }
                else {
                echo "<div class=\"col-md-3 text-end\">
                <button type=\"button\" class=\"btn btn-outline-primary me-2\" onclick=\"location.href='../blog/SignIn.html'\">Login</button>
                <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='SignUp.html'\">Sign-up</button>
                </div>";
                }
            ?>
        </header>
    </div>  

    <div id="registeration">
        <div id="title"><h3>수강 신청</h3></div>
        <form method=POST action="#.php">
            <table id="condition">
                <tbody>
                    <tr>
                        <th><label>학번</label></th>
                        <?php
                            echo "<td><input type=\"number\" value=\"$sno\" disabled=\"disabled\"></td>";
                        ?>
                        <th><label>년도</label></th>
                        <?php
                            echo "<td><input type=\"number\" value=\"$year\" disabled=\"disabled\"></td>";
                        ?>
                        <th><label>학기</label></th>
                        <?php
                            echo "<td><input type=\"number\" value=\"$semester\" disabled=\"disabled\"></td>";
                        ?>
                        <td><button type="submit" name="register" value=True>신청</td>
                    </tr>
                </tbody>
            </table>
            <div class="subjects_info">
                <h2>수강신청 가능한 과목</h2>
            </div>
            <table class="subjects">
                <tbody>
                    <tr>
                        <th class="code">과목코드</th>
                        <th class="subject_name">과목명</th>
                        <th class="professor">교수명</th>
                        <th class="credit">학점</th>
                        <th class="select"></th>
                    </tr>
                    <?php
                        #선택해제 상태인 과목들을 나열
                        $sql = "SELECT subject_tbl.code, subject_tbl.subject_name, subject_tbl.professor, subject_tbl.credit
                        FROM subject_tbl, subjectsToRegister_tbl
                        WHERE subject_tbl.code = subjectsToRegister_tbl.code
                        AND subjectsToRegister_tbl.sno = $sno
                        AND subjectsToRegister_tbl.selected = 0";
                        $result = mysqli_query($connect, $sql);

                        while ($subjects = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class=\"code\">".$subjects['code']."</td>";
                            echo "<td class=\"subject_name\">".$subjects['subject_name']."</td>";
                            echo "<td class=\"professor\">".$subjects['professor']."</td>";
                            echo "<td class=\"credit\">".$subjects['credit']."</td>";
                            echo "<td class=\"select\"><button type=\"submit\" name=\"select_code\" value=".$subjects['code'].">선택</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
            <div class="subjects_info">
                <h2>수강신청 선택된 과목</h2>
            </div>
            <table class="subjects">
                <tbody>
                    <tr>
                        <th class="code">과목코드</th>
                        <th class="subject_name">과목명</th>
                        <th class="professor">교수명</th>
                        <th class="credit">학점</th>
                        <th class="select"></th>
                    </tr>
                    <?php
                        #선택 상태인 과목들을 나열
                        $sql = "SELECT subject_tbl.code, subject_tbl.subject_name, subject_tbl.professor, subject_tbl.credit
                        FROM subject_tbl, subjectsToRegister_tbl
                        WHERE subject_tbl.code = subjectsToRegister_tbl.code
                        AND subjectsToRegister_tbl.sno = $sno
                        AND subjectsToRegister_tbl.selected = 1";
                        $result = mysqli_query($connect, $sql);

                        while ($subjects = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class=\"code\">".($subjects['code'])."</td>";
                            echo "<td class=\"subject_name\">".($subjects['subject_name'])."</td>";
                            echo "<td class=\"professor\">".($subjects['professor'])."</td>";
                            echo "<td class=\"credit\">".($subjects['credit'])."</td>";
                            echo "<td class=\"select\"><button type=\"submit\" name=\"unselect_code\" value=".$subjects['code'].">해제</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </form>
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

<?php
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>