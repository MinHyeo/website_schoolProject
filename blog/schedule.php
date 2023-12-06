<?php error_reporting(0);
    include 'php/inc_head.php';
    include 'php/ConnectDB.php';

    if (!isset($_SESSION['sno'])) {
        echo '<script>alert("로그인을 해주세요.")</script>';
        echo '<script>window.history.back()</script>';
        exit;
    }
    
    $sno = $_SESSION['sno'];
    
    #시간표 페이지에 처음 들어오거나 수강신청을 하고 오면 마지막으로 수강한 학년와 학기가 선택 및 조회
    if (!isset($_SESSION['grade']) && !isset($_SESSION['semester'])) {
        #학생이 마지막으로 수강한 학년
        $sql = "SELECT max(grade)
        AS max_grade
        FROM classes_tbl
        WHERE sno = $sno";
        $result = mysqli_query($connect, $sql);
        $latestGrade = mysqli_fetch_assoc($result)['max_grade'];

        $grade = (int)$latestGrade;
    
        #학생이 마지막으로 수강한 학기
        $sql = "SELECT max(semester)
        AS max_semester
        FROM classes_tbl
        WHERE sno = $sno
        AND grade = $latestGrade";
        $result = mysqli_query($connect, $sql);
        $latestSemesters = mysqli_fetch_assoc($result);
        $latestSemester = $latestSemesters['max_semester'];

        $semester = (int)$latestSemester;
    }
    else {
        $grade = (int)$_SESSION['grade'];
        $semester = (int)$_SESSION['semester'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>개인시간표 조회</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/schedule.css">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">교육과정</a></li>
            <li><a href="#" class="nav-link px-2">성적관리</a></li>
            <li><a href="schedule.php" class="nav-link px-2">시간표조회</a></li>
            <li><a href="registeration.php" class="nav-link px-2">수강신청</a></li>
            <li><a href="Borad.html" class="nav-link px-2">게시판</a></li>
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

    <div id=schedule>
        <div id="title"><h3>개인시간표 조회</h3></div>
        <form method=post action="php/schedule_action.php">
            <table id="condition">
                <tbody>
                    <tr>
                        <th><label for="student_code">학번</label></th>
                        <?php
                            echo "<td><input type=\"number\" name=\"student_code\" value=\"$sno\" disabled=\"disabled\"></td>";
                        ?>
                        <th><label for="grade">학년</label></th>
                        <td>
                            <select name="grade">
                                <?php
                                    #학생이 수강한 학년들
                                    $sql = "select grade
                                    from classes_tbl
                                    where sno = $sno
                                    group by grade";
                                    $result = mysqli_query($connect, $sql);
                                    #학생이 수강한 학년들을 <option>에 나열
                                    while ($grades = mysqli_fetch_assoc($result)) {
                                        #마지막으로 조회한 옵션이 선택되어있음
                                        $selected = ($grade == (int)$grades['grade']) ? 'selected' : '';
                                        echo "<option $selected>".($grades['grade'])."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <th><label for="semester">학기</label></th>
                        <td>
                            <select name="semester">
                                <?php
                                    #마지막으로 조회한 옵션이 선택되어있음
                                    for ($i = 1; $i <= 2; $i++) {
                                        $selected = ($semester == $i) ? 'selected' : '';
                                        echo "<option $selected>$i</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td><button type="submit">조회</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div id="schedule_info">
            <?php
                echo "<h2>{$grade}학년 {$semester}학기 시간표</h2>"
            ?>
        </div>
        <table id="time_table">
            <tbody>
                <tr>
                    <th>구&nbsp&nbsp&nbsp&nbsp분</th>
                    <th>월</th>
                    <th>화</th>
                    <th>수</th>
                    <th>목</th>
                    <th>금</th>
                </tr>
                <?php
                    for ($i = 1; $i <= 14; $i++) {
                        echo "<tr>";
                        #9:00 → 09:00
                        $zero = (($i+8) < 10) ? '0' : '';
                        echo "<td align='center'>".$i."교시<br>(".$zero.($i+8).":00~".($i+8).":50)</td>";
                        for ($j = 1; $j <= 5; $j++) {
                            $sql = "SELECT subject_tbl.subject_name, subject_tbl.professor, schedule_tbl.room
                            FROM subject_tbl, classes_tbl, schedule_tbl
                            WHERE subject_tbl.code = classes_tbl.code
                            AND classes_tbl.sno = $sno
                            AND classes_tbl.grade = $grade
                            AND classes_tbl.semester = $semester
                            AND classes_tbl.code = schedule_tbl.code
                            AND schedule_tbl.day = $j
                            AND schedule_tbl.period = $i";
                            $result = mysqli_query($connect, $sql);
                            $subject = mysqli_fetch_assoc($result);
                            echo "<td>".$subject['subject_name']."<br>".$subject['professor']."<br>".$subject['room']."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
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

<?php
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
    #시간표 페이지에 처음 들어오거나 수강신청을 하고 오면 마지막으로 수강한 학년와 학기가 선택 및 조회 (2)
    $_SESSION['grade'] = NULL;
    $_SESSION['semester'] = NULL;
?>