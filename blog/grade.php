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

    #성적 입력 전인지 후인지 구분
    $sql = "SELECT *
    FROM score_tbl
    WHERE sno = $sno";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows == 0) {
        $isScore = False;
    }
    else {
        $isScore = True;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>성적관리</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/grade.css">
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

    <div id="grade">
        <div id="title"><h3>성적 관리</h3></div>
        <table>
            <thead>
                <tr>
                    <?php
                        $sql = "SELECT name, major,sno
                        FROM student_tbl
                        WHERE sno = $sno";
                        $result = mysqli_query($connect, $sql);
                        
                        $studentData = mysqli_fetch_assoc($result);

                        echo '<th>학번</th>';
                        echo '<td>'.$studentData['sno'].'</th>';
                        echo '<th>성명</th>';
                        echo '<td>'.$studentData['name'].'</th>';
                        echo '<th>전공</th>';
                        echo '<td>'.$studentData['major'].'</th>';
                    ?>
                </tr>
            </thead>
        </table>
        <form method=post action="php/grade_add.php">
            <table>
                <thead>
                    <tr>
                        <th>교과목번호</th>
                        <th>교과목명</th>
                        <th>학점</th>
                        <th>등급</th>
                        <th>담당교수</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        #1~4학년
                        for ($i = 1; $i <= 4; $i++) {
                            #1~2학기
                            for ($j = 1; $j <= 2; $j++) {
                                #$grade학년 $semester학기까지만 반복
                                if (($i > $grade) || ($i == $grade && $j > $semester)) break;

                                echo '<tr>
                                <th colspan="5">'.$i.'학년 '.$j.'학기</th>
                                </tr>';

                                #수강 테이블에서 $sno가 수강한 수업들을 SELECT
                                $sql = "SELECT subject_tbl.code, subject_tbl.subject_name, subject_tbl.professor, subject_tbl.credit
                                FROM subject_tbl, classes_tbl
                                WHERE subject_tbl.code = classes_tbl.code
                                AND classes_tbl.sno = $sno
                                AND subject_tbl.grade = $i
                                AND subject_tbl.semester = $j";
                                $result = mysqli_query($connect, $sql);

                                #학기별 신청학점
                                $appliedCredit = 0;
                                #학기별 취득학점
                                $earnedCredit = 0;

                                while ($subjectData = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                    <td>'.$subjectData['code'].'</td>
                                    <td>'.$subjectData['subject_name'].'</td>
                                    <td>'.$subjectData['credit'].'</td>
                                    <td>';
                                    #성적 입력 전
                                    if ($isScore == False) {
                                        #선택한 성적을 $_POST['123456']로 전달
                                        echo '<select name="'.$subjectData['code'].'">';
                                        if ($subjectData['credit'] <= 1) {
                                            echo '<option>P</option>
                                            <option>NP</option>';
                                        }
                                        else {
                                            echo '<option>A+</option>
                                            <option>A0</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B0</option>
                                            <option>B-</option>
                                            <option>C+</option>
                                            <option>C0</option>
                                            <option>C-</option>
                                            <option>F</option>';
                                        }
                                        echo '</select>';

                                        #학기별 신청학점의 합
                                        $appliedCredit += $subjectData['credit'];
                                    }
                                    #성적 입력 후
                                    else {
                                        $code = $subjectData['code'];

                                        #성적 테이블에서 $code의 성적을 SELECT
                                        $sql = "SELECT sgrade
                                        FROM score_tbl
                                        WHERE sno = $sno
                                        AND code = $code";
                                        $result2 = mysqli_query($connect, $sql);

                                        $sgrade = mysqli_fetch_assoc($result2)['sgrade'];

                                        echo $sgrade;

                                        #학기별 신청학점의 합
                                        $appliedCredit += $subjectData['credit'];

                                        #학기별 취득학점의 합
                                        if ($sgrade !== 'NP' && $sgrade !== 'F') {
                                            $earnedCredit += $subjectData['credit'];
                                        }
                                    }
                                    echo '</td>
                                    <td>'.$subjectData['professor'].'</td>
                                    </tr>';
                                }
                                echo '<tr>
                                <td colspan="5">신청학점 : '.number_format($appliedCredit, 2).' 취득학점 : '.number_format($earnedCredit, 2).'</td>
                                </tr>';
                                #총 신청학점의 합
                                $appliedCreditSum += $appliedCredit;
                                #총 취득학점의 합
                                $earnedCreditSum += $earnedCredit;
                            }
                        }
                    ?>
                </tbody>
            </table>
            <?php
                #성적 입력 전이라면 선택 버튼 생성
                if ($isScore == False) {
                    echo '<div class="button">
                    <input type="submit" name="register" value="선택">
                    </div>';
                }
            ?>
        </form>
        <?php
            #성적 입력 후라면 수정 버튼 생성
            if ($isScore == True) {
                echo '<form method=post action="php/grade_modify.php">
                <div class="button">
                <input type="submit" name="register" value="수정">
                </div>
                </form>';
            }
        ?>
        <table>
            <thead>
                <tr>
                    <th>총 신청학점</th>
                    <th>
                        <?php
                            echo number_format($appliedCreditSum, 2);
                        ?>
                    </th>
                    <th>총 취득학점</th>
                    <th>
                        <?php
                            echo number_format($earnedCreditSum, 2);
                        ?>
                    </th>
                </tr>
            </thead>
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