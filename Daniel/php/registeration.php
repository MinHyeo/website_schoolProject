<?php error_reporting(0);
    #include 'inc_head.php';
    session_start();

    #include 'ConnectDB.php';
    $connect = mysqli_connect('localhost', 'root');
    $db = mysqli_select_db($connect, 'school_db');

    #$sno = (int)$_SESSION['sno'];
    $sno = 20200001;

    $year = 2023;
    $semester = 2;
    
    #수강신청 테이블(subjectcsToRegister_tbl)에 $sno 학번이 있는지 확인해서 $sno 학생이 수강신청 페이지에 처음 들어왔는지 확인
    $sql = "SELECT COUNT(*)
    FROM subjectsToRegister_tbl
    WHERE sno = $sno";
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_assoc($result);    
    $count = (int)$rows['COUNT(*)'];

    #수강신청 페이지에 $sno 학생이 처음 들어왔다면 아직 듣지 않은 과목들을 출력
    if ($count == 0) {
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
        <link rel="stylesheet" href="../css/registeration.css">
    </head>
    <body>
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
                            echo "<tr><td class=\"code\">".($subjects['code'])."</td>";
                            echo "<td class=\"subject_name\">".($subjects['subject_name'])."</td>";
                            echo "<td class=\"professor\">".($subjects['professor'])."</td>";
                            echo "<td class=\"credit\">".($subjects['credit'])."</td>";
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
        
    </body>
</html>

<?php
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>