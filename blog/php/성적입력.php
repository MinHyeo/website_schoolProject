<?php
    include 'inc_head.php';
    include 'ConnectDB.php';

    $sno = $_SESSION['sno'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];

    $sql="SELECT code, grade, semester
    FROM classes_tbl
    WHERE sno= $sno";
    $result = mysqli_query($connect,$sql);
    while($subjectData=mysqli_fetch_assoc($result)){
        if(($subjectData['grade']==$grade&&$subjectData['semester']>=($semester+1))||($subjectData['grade']>=($grade+1))) continue;

        $code=$subjectData['code'];
        $sgrade=$_POST[$code];
        $sql="INSERT INTO score_tbl VALUES
        ($sno,$code,'$sgrade')";
        mysqli_query($connect,$sql);
    }
    
    echo "<script>window.history.back()</script>";
?>