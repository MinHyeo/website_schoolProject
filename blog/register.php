<?php error_reporting(0);
    include 'php/inc_head.php';
    include 'php/ConnectDB.php';

    if (!isset($_SESSION['sno'])) {
        echo '<script>alert("로그인을 해주세요.")</script>';
        echo '<script>window.history.back()</script>';
        exit;
    }
    
    $sno = $_SESSION['sno'];
    $grade = $_SESSION['grade'];
    $semester = $_SESSION['semester'];

    #현재 학기의 다음 학기를 수강신청할 학기로 저장
    if ($semester == 1) {
        $registerGrade = $grade;
        $registerSemester = $semester + 1;
    }
    if ($semester == 2) {
        $registerGrade = $grade + 1;
        $registerSemester = $semester - 1;
    }
    
    #수강신청 테이블(register_tbl)에 $sno 학번이 있는지 확인해서 $sno 학생이 수강신청 페이지에 처음 들어왔는지 확인
    $sql = "SELECT *
    FROM register_tbl
    WHERE sno = $sno";
    $result1 = mysqli_query($connect, $sql);

    #수강신청 테이블은 비어있지만 수강정보 테이블에 수강신청할 학년과 학기의 과목이 있다면 페이지에 처음 들어온 것이 아님
    $sql = "SELECT *
    FROM classes_tbl, subject_tbl
    WHERE classes_tbl.sno = $sno
    AND classes_tbl.code = subject_tbl.code
    AND subject_tbl.grade = $registerGrade
    AND subject_tbl.semester = $registerSemester";
    $result2 = mysqli_query($connect, $sql);

    #수강신청 페이지에 $sno 학생이 처음 들어왔다면 수강신청 테이블에 수강신청할 과목들을 추가
    if ($result1->num_rows == 0 && $result2->num_rows == 0) {
        #수강신청 테이블에 수강신청할 과목들을 추가
        $sql = "SELECT code
        FROM subject_tbl
        WHERE grade = $registerGrade
        AND semester = $registerSemester";
        $result = mysqli_query($connect, $sql);

        while ($subjectData = mysqli_fetch_assoc($result)) {
            $code = $subjectData['code'];
            $sql = "INSERT INTO register_tbl VALUES
            ($sno, $code, 0)";
            mysqli_query($connect, $sql);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>수강 신청</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/register.css">
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

    <div id="registeration">
        <div id="title">
            <h3>수강 신청</h3>
        </div>
        <form method=post action="php/register_action.php">
            <table id="condition">
                <tbody>
                    <tr>
                        <th><label>학번</label></th>
                        <?php
                            echo '<td>
                            <input type="number" value='.$sno.' disabled>
                            </td>';
                        ?>
                        <th><label>학년</label></th>
                        <?php
                            echo '<td>
                            <input type="number" value='.$registerGrade.' disabled>
                            <input name="registerGrade" value='.$registerGrade.' hidden>
                            </td>';
                        ?>
                        <th><label>학기</label></th>
                        <?php
                            echo '<td>
                            <input type="number" value='.$registerSemester.' disabled>
                            <input name="registerSemester" value='.$registerSemester.' hidden>
                            </td>';
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
                        FROM subject_tbl, register_tbl
                        WHERE subject_tbl.code = register_tbl.code
                        AND register_tbl.sno = $sno
                        AND register_tbl.selected = 0";
                        $result = mysqli_query($connect, $sql);

                        while ($subjectData = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <td class="code">'.$subjectData['code'].'</td>
                            <td class="subject_name">'.$subjectData['subject_name'].'</td>
                            <td class="professor">'.$subjectData['professor'].'</td>
                            <td class="credit">'.$subjectData['credit'].'</td>
                            <td class="select"><button type="submit" name="select_code" value='.$subjectData['code'].'>선택</td>
                            </tr>';
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
                        FROM subject_tbl, register_tbl
                        WHERE subject_tbl.code = register_tbl.code
                        AND register_tbl.sno = $sno
                        AND register_tbl.selected = 1";
                        $result = mysqli_query($connect, $sql);

                        while ($subjectData = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <td class="code">'.$subjectData['code'].'</td>
                            <td class="subject_name">'.$subjectData['subject_name'].'</td>
                            <td class="professor">'.$subjectData['professor'].'</td>
                            <td class="credit">'.$subjectData['credit'].'</td>
                            <td class="select"><button type="submit" name="unselect_code" value='.$subjectData['code'].'>해제</td>
                            </tr>';
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

<?php
    if (is_resource($connect)) {
        mysqli_close($connect);
    }
?>