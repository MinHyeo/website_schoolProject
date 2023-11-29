<?php error_reporting(0);
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "";
    
    $connect = mysqli_connect($db_host, $db_user, $db_pw);
    
    mysqli_select_db($connect, "deu_db");

    $sno = 20200001;
    $year = 2023;
    $semester = 1;

    echo "<table width='500' height='500' border='1' style='font-size:12'>";
    echo "<tr>
        <td align='center'>구분</td>
        <td align='center'>월</td>
        <td align='center'>화</td>
        <td align='center'>수</td>
        <td align='center'>목</td>
        <td align='center'>금</td>
    </tr>";

    for ($i = 1; $i <= 8; $i++) {
        echo "<tr>
            <td align='center'>".$i."교시<br>".($i+8).":00~".($i+8).":50</td>";
        for ($j = 1; $j <= 5; $j++) {
            $sql = "select subject_tbl.SUBJECT_NAME
                from subject_tbl, classes_tbl, schedule_tbl
                where subject_tbl.CODE = classes_tbl.CODE
                and classes_tbl.SNO = $sno
                and classes_tbl.YEAR = $year
                and classes_tbl.SEMESTER = $semester
                and classes_tbl.CODE = schedule_tbl.CODE
                and schedule_tbl.DAY = $j
                and schedule_tbl.PERIOD = $i";
            $result = mysqli_query($connect, $sql);
            $subjectName = mysqli_fetch_row($result);
            echo "<td>".$subjectName[0]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>