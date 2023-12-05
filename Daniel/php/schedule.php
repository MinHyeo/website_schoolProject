<?php error_reporting(0);
    #include 'inc_head.php';
    session_start();

    #include 'ConnectDB.php';
    $connect = mysqli_connect('localhost', 'root');
    $db = mysqli_select_db($connect, 'school_db');

    #$sno = (int)$_SESSION['sno'];
    $sno = 20200001;
    
    #시간표 페이지에 처음 들어왔다면 마지막으로 수강한 년도와 학기가 선택 및 조회
    if (!isset($_POST['year']) && !isset($_POST['semester'])) {
        #학생이 마지막으로 수강한 년도
        $sql = "SELECT max(year)
        AS max_year
        FROM classes_tbl
        WHERE sno = $sno";
        $result = mysqli_query($connect, $sql);
        $latestYear = (int)mysqli_fetch_assoc($result)['max_year'];

        $year = (int)$latestYear;
    
        #학생이 마지막으로 수강한 학기
        $sql = "SELECT max(semester)
        AS max_semester
        FROM classes_tbl
        WHERE sno = $sno
        AND year = $latestYear";
        $result = mysqli_query($connect, $sql);
        $latestSemesters = mysqli_fetch_assoc($result);
        $latestSemester = (int)$latestSemesters['max_semester'];

        $semester = (int)$latestSemester;
    }
    else {
        $year = (int)$_POST['year'];
        $semester = (int)$_POST['semester'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>개인시간표 조회</title>
        <link rel="stylesheet" href="../css/schedule.css">
    </head>
    <body>
        <div id="title"><h3>개인시간표 조회</h3></div>
        <form method=POST action="# ">
            <table id="condition">
                <tbody>
                    <tr>
                        <th><label for="student_code">학번</label></th>
                        <?php
                            echo "<td><input type=\"number\" name=\"student_code\" value=\"$sno\" disabled=\"disabled\"></td>";
                        ?>
                        <th><label for="year">년도</label></th>
                        <td>
                            <select name="year">
                                <?php
                                    #학생이 수강한 년도들
                                    $sql = "select year
                                    from classes_tbl
                                    where sno = $sno
                                    group by year";
                                    $result = mysqli_query($connect, $sql);
                                    #학생이 수강한 년도들을 <option>에 나열
                                    while ($years = mysqli_fetch_assoc($result)) {
                                        #마지막으로 조회한 옵션이 선택되어있음
                                        $selected = ($year == (int)$years['year']) ? 'selected' : '';
                                        echo "<option $selected>".($years['year'])."</option>";
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
                        <td><button type="submit">조회</td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div id="schedule_info">
            <?php
                echo "<h2>{$year}학년도 {$semester}학기 시간표</h2>"
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
                            AND classes_tbl.year = $year
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
    </body>
</html>

<?php
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>