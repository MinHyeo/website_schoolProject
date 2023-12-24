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
    
    #시간표 페이지에 처음 들어오면 현재 학년와 학기가 선택
    if (!isset($_SESSION['scheduleGrade']) && !isset($_SESSION['scheduleSemester'])) {
        $scheduleGrade = $grade;
        $scheduleSemester = $semester;
    }
    #조회한 학년과 학기를 저장, 수강신청을 하고 왔다면 수강신청한 학년과 학기를 저장
    else {
        $scheduleGrade = $_SESSION['scheduleGrade'];
        $scheduleSemester = $_SESSION['scheduleSemester'];
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

    <div id="schedule">
        <div id="title">
            <h3>개인시간표 조회</h3>
        </div>
        <form method=post action="php/schedule_action.php">
            <table id="condition">
                <tbody>
                    <tr>
                        <th>
                            <label for="student_code">학번</label>
                        </th>
                        <?php
                            echo '<td>
                            <input type="number" name="student_code" value='.$sno.' disabled>
                            </td>';
                        ?>
                        <th>
                            <label for="scheduleGrade">학년</label>
                        </th>
                        <td>
                            <select name="scheduleGrade">
                                <?php
                                    #학생이 수강한 학년들
                                    $sql = "SELECT subject_tbl.grade
                                    FROM subject_tbl, classes_tbl
                                    WHERE classes_tbl.sno = $sno
                                    AND classes_tbl.code = subject_tbl.code
                                    GROUP BY grade";
                                    $result = mysqli_query($connect, $sql);
                                    #학생이 수강한 학년들을 <option>에 나열
                                    while ($gradeData = mysqli_fetch_assoc($result)) {
                                        #마지막으로 조회한 옵션이 선택되어있음
                                        $selected = ($scheduleGrade == $gradeData['grade']) ? 'selected' : '';
                                        echo '<option '.$selected.'>'.$gradeData['grade'].'</option>';
                                    }
                                ?>
                            </select>
                        </td>
                        <th>
                            <label for="scheduleSemester">학기</label>
                        </th>
                        <td>
                            <select name="scheduleSemester">
                                <?php
                                    #마지막으로 조회한 옵션이 선택되어있음
                                    for ($i = 1; $i <= 2; $i++) {
                                        $selected = ($scheduleSemester == $i) ? 'selected' : '';
                                        echo '<option '.$selected.'>'.$i.'</option>';
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit">조회</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div id="schedule_info">
            <?php
                echo '<h2>'.$scheduleGrade.'학년 '.$scheduleSemester.'학기 시간표</h2>';
            ?>
        </div>
        <table id="time_table">
            <tbody>
                <tr>
                    <th></th>
                    <th>월</th>
                    <th>화</th>
                    <th>수</th>
                    <th>목</th>
                    <th>금</th>
                </tr>
                <?php
                    $scheduleArr = array_fill(0, 5, array_fill(0, 14, NULL));
                
                    #과목별로 배경색을 저장하기 위한 배열과 인덱스
                    $colors = array('#E76F51', '#F4A261', '#E9C46A', '#A7C957', '#94D2BD', '#2A9D8F', '#E9D8A6');
                    $scheduleColorArr = array();
                    $colorsIdx = 0;

                    #과목 배경색 지정을 랜덤하게 변경 (그냥 재미있을거 같아서 한번 넣어봄)
                    shuffle($colors);

                    #선택된 학년과 학기에 수강한 수업들의 과목코드, 수업하는 요일과 교시
                    $sql = "SELECT schedule_tbl.code, schedule_tbl.day, schedule_tbl.period
                    FROM schedule_tbl, classes_tbl, subject_tbl
                    WHERE schedule_tbl.code = classes_tbl.code
                    AND classes_tbl.sno = $sno
                    AND subject_tbl.code = classes_tbl.code
                    AND subject_tbl.grade = $scheduleGrade
                    AND subject_tbl.semester = $scheduleSemester";
                    $result = mysqli_query($connect, $sql);

                    #과목코드와 과목의 수업시간을 교시마다 저장
                    while ($scheduleData = mysqli_fetch_assoc($result)) {
                        $day = $scheduleData['day'];
                        $period = $scheduleData['period'];
                        $code = $scheduleData['code'];

                        $scheduleArr[$day-1][$period-1] = $code;

                        #과목마다 배경색을 저장
                        if (!$scheduleColorArr[$code]) {
                            $scheduleColorArr[$code] = $colors[$colorsIdx++];
                        }
                    }

                    #시간표 출력
                    for ($i = 0; $i < 14; $i++) {
                        echo '<tr>';

                        #9:00 → 09:00
                        $zero = (($i+9) < 10) ? '0' : '';
                        
                        echo '<td align="center">'.($i+1).'교시<br>('.$zero.($i+9).':00~'.$zero.($i+9).':50)</td>';

                        for ($j = 0; $j < 5; $j++) {
                            #연강 수업의 첫번째 시간의 <td>에 rowspan을 했으므로 무시
                            if ($scheduleArr[$j][$i] === "consecutive") {
                                continue;
                            }
                            #수업이 없는 시간이면 빈 <td>
                            if ($scheduleArr[$j][$i] === NULL) {
                                echo '<td></td>';
                                continue;
                            }
                            
                            #연강 수업이면 수업의 두번째 시간부터는 과목코드가 아닌 "consecutive"를 저장
                            $row = 1;
                            while ($scheduleArr[$j][$i] !== NULL) {
                                if ($scheduleArr[$j][$i] === $scheduleArr[$j][$i+$row]) {
                                    $scheduleArr[$j][$i+$row] = "consecutive";
                                    $row++;
                                }
                                else {
                                    break;
                                }
                            }
                            
                            $code = $scheduleArr[$j][$i];
                            $day = $j + 1;
                            $period = $i + 1;

                            #수업의 과목이름, 교수명, 교실위치
                            $sql = "SELECT subject_tbl.subject_name, subject_tbl.professor, schedule_tbl.room
                            FROM subject_tbl, schedule_tbl
                            WHERE subject_tbl.code = schedule_tbl.code
                            AND schedule_tbl.code = $code
                            AND schedule_tbl.day = $day
                            AND schedule_tbl.period = $period";
                            $result = mysqli_query($connect, $sql);
                            $subjectData = mysqli_fetch_assoc($result);

                            #수업 정보를 표시, 연강 수업이라면 연강시간 만큼 rowspan
                            echo '<td rowspan="'.$row.'" style="background-color: '.$scheduleColorArr[$code].'">'.$subjectData['subject_name'].'<br>'.$subjectData['professor'].'<br>'.$subjectData['room'].'</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
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