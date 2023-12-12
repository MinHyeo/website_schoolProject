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
    $sql = "SELECT *
    FROM score_tbl
    WHERE sno=$sno";
    $result = mysqli_query($connect, $sql);

    
        if ($_POST['select_grade']) {
            $code = $_POST['select_grade'];
            $sql = "UPDATE score_tbl
            SET selected = 1
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
            
            $_POST['select_grade'] = NULL;
        }
        if ($_POST['unselect_grade']) {
            $code = $_POST['unselect_grade'];
            $sql = "UPDATE score_tbl
            SET selected = 0
            WHERE sno = $sno
            AND code = $code";
            mysqli_query($connect, $sql);
            
            $_POST['unselect_grade'] = NULL;
        }
        if ($_POST['']) {
            $sql = "SELECT code
            FROM score_tbl
            WHERE sno = $sno
            AND selected = 1";
            $result = mysqli_query($connect, $sql);
            while ($subjects = mysqli_fetch_assoc($result)) {
                $code = $subjects['code'];
                $sql = "INSERT INTO selectscore_tbl VALUES
                ($sno, $code, $sgrade)";
                mysqli_query($connect, $sql);

                $sql = "DELETE
                FROM subjectsToRegister_tbl
                WHERE sno = $sno
                AND code = $code";
                mysqli_query($connect, $sql);
            }

            $_POST['register'] = NULL;
        }

?>

<!DOCTYPE html>
<html>
<head>
    <title>성적관리</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/schedule.css">
    <style>
        #성적표 {
        margin: 0 7.4%;
        }

        .button {
        display: flex;
        justify-content: flex-end; 
        align-items: center; 
        margin: 0; 
        margin-right: 160px; 
        }
        .button input {
        padding: 10px 20px; 
        font-size: 16px; 
        }
        #title {
        height: 40px;
        border-bottom: 1px solid #e0e0e0;
        }
        h2 {
            margin-bottom: 10px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto; 
        }
        tbody{
            align-items: center;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        table:nth-of-type(2) tbody tr:nth-child(2) {
            background-color: #808080; 
        }
        table:nth-of-type(2) tbody tr:nth-child(11) {
            background-color: #808080; 
        }
        table:nth-of-type(2) tbody tr:nth-child(20) {
            background-color: #808080; 
        }
        table:nth-of-type(2) tbody tr:nth-child(28) {
            background-color: #808080; 
        }
    </style>
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
    <div id="성적표">
    <div id="title"><h3>성적 관리</h3></div>
    <table>
        <tbody>
            <tr>
                <?php
                 $sql = "SELECT name, major,sno
                 FROM student_tbl
                 WHERE sno = $sno";
                 $result = mysqli_query($connect, $sql);
                 $student = mysqli_fetch_assoc($result);

                 echo "<th>성명</th>";
                 echo "<th>".($student['name'])."</th>";
                 echo "<th>전공</th>";
                 echo "<th>".($student['major'])."</th>";
                 echo "<th>학번</th>";
                echo "<th>".($student['sno'])."</th>";
                ?>
            </tr>
        </tbody>
    </table>
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
            <tr>
                <th colspan="5">1학년 1학기</th>
            </tr>
            <tr>
                <td>교과목번호</td>
                <td>교과목명</td>
                <td>학점</td>
                <td>등급</td>
                <td>담당교수</td>
            </tr>
            <?php
                $sql = "(SELECT sgrade as grade, NULL as code, NULL as subject_name, NULL as credit, NULL as professor, NULL as year, NULL as semester FROM score_tbl)";
                $sql .= " UNION (SELECT NULL as grade, code, subject_name, credit, professor,year,semester FROM subject_tbl)";
                
                $result = mysqli_query($connect, $sql);
                while ($student = mysqli_fetch_assoc($result)){
                    if(($student['year'])==1&&($student['semester'])==1){
                        echo "<tr>";
                        echo "<td>" . ($student['code']) . "</td>";
                        echo "<td>" . ($student['subject_name']) . "</td>";
                        echo "<td>" . ($student['credit']) . "</td>";
                        if(($student['credit'])==1){
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='P'>P</option>";
                            echo "<option name='NP'>NP</option>";
                            echo "</select>";
                            echo "</td>";  
                        }
                        else{
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='A+'>A+</option>";
                            echo "<option name='A0'>A0</option>";
                            echo "<option name='A-'>A-</option>";
                            echo "<option name='B+'>B+</option>";
                            echo "<option name='B0'>B0</option>";
                            echo "<option name='B-'>B-</option>";
                            echo "<option name='C+'>C+</option>";
                            echo "<option name='C0'>C0</option>";
                            echo "<option name='C-'>C-</option>";
                            echo "<option name='F'>F</option>";
                            echo "</select>";
                            echo "</td>";
                        }
                        echo "<td>" . ($student['professor']) . "</td>";
                        echo "</tr>"; 
                    }
                }
                ?>  
            <tr>
                <th colspan="5">1학년 2학기</th>
            </tr>
            <tr>
                <td>교과목번호</td>
                <td>교과목명</td>
                <td>학점</td>
                <td>등급</td>
                <td>담당교수</td>
            </tr>
            <?php
                $sql = "(SELECT sgrade as grade, NULL as code, NULL as subject_name, NULL as credit, NULL as professor, NULL as year, NULL as semester FROM score_tbl)";
                $sql .= " UNION (SELECT NULL as grade, code, subject_name, credit, professor,year,semester FROM subject_tbl)";
                
                $result = mysqli_query($connect, $sql);
                while ($student = mysqli_fetch_assoc($result)){
                    if(($student['year'])==1&&($student['semester'])==2){
                        echo "<tr>";
                        echo "<td>" . ($student['code']) . "</td>";
                        echo "<td>" . ($student['subject_name']) . "</td>";
                        echo "<td>" . ($student['credit']) . "</td>";
                        if(($student['credit'])==1){
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='P'>P</option>";
                            echo "<option name='NP'>NP</option>";
                            echo "</select>";
                            echo "</td>";  
                        }
                        else{
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='A+'>A+</option>";
                            echo "<option name='A0'>A0</option>";
                            echo "<option name='A-'>A-</option>";
                            echo "<option name='B+'>B+</option>";
                            echo "<option name='B0'>B0</option>";
                            echo "<option name='B-'>B-</option>";
                            echo "<option name='C+'>C+</option>";
                            echo "<option name='C0'>C0</option>";
                            echo "<option name='C-'>C-</option>";
                            echo "<option name='F'>F</option>";
                            echo "</select>";
                            echo "</td>";
                        }
                        echo "<td>" . ($student['professor']) . "</td>";
                        echo "</tr>"; 
                    }
                }
                ?>     
                <tr>
                <th colspan="5">2학년 1학기</th>
            </tr>
            <tr>
                <td>교과목번호</td>
                <td>교과목명</td>
                <td>학점</td>
                <td>등급</td>
                <td>담당교수</td>
            </tr>
            <?php
                $sql = "(SELECT sgrade as grade, NULL as code, NULL as subject_name, NULL as credit, NULL as professor, NULL as year, NULL as semester FROM score_tbl)";
                $sql .= " UNION (SELECT NULL as grade, code, subject_name, credit, professor,year,semester FROM subject_tbl)";
                
                $result = mysqli_query($connect, $sql);
                while ($student = mysqli_fetch_assoc($result)){
                    if(($student['year'])==2&&($student['semester'])==1){
                        echo "<tr>";
                        echo "<td>" . ($student['code']) . "</td>";
                        echo "<td>" . ($student['subject_name']) . "</td>";
                        echo "<td>" . ($student['credit']) . "</td>";
                        if(($student['credit'])==1){
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='P'>P</option>";
                            echo "<option name='NP'>NP</option>";
                            echo "</select>";
                            echo "</td>";  
                        }
                        else{
                            echo "<td>";
                            echo "<select name='sgrade'>";
                            echo "<option name='A+'>A+</option>";
                            echo "<option name='A0'>A0</option>";
                            echo "<option name='A-'>A-</option>";
                            echo "<option name='B+'>B+</option>";
                            echo "<option name='B0'>B0</option>";
                            echo "<option name='B-'>B-</option>";
                            echo "<option name='C+'>C+</option>";
                            echo "<option name='C0'>C0</option>";
                            echo "<option name='C-'>C-</option>";
                            echo "<option name='F'>F</option>";
                            echo "</select>";
                            echo "</td>";
                        }
                        echo "<td>" . ($student['professor']) . "</td>";
                        echo "</tr>"; 
                    }
                }
                ?>   
            <tr>
                <th colspan="5">신청학점 : 00.00 취득학점 : 00.00</th>
            </tr>
        </tbody>
    </table>
    <div class="button">
        <input type="submit" name="register" value="선택">
    </div>
    <table>
        <thead>
            <tr>
                <th>총신청학점</th>
                <th>00.00</th>
                <th>총취득학점</th>
                <th>00.00</th>
            </tr>
        </thead>
    </table>
            </div>
    <div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="main.php" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">교육과정</a></li>
        <li class="nav-item"><a href="성적표.php" class="nav-link px-2 text-body-secondary">성적관리</a></li>
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