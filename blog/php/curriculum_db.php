<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_passwd = "";

    $connect = mysqli_connect($db_host, $db_user, $db_passwd);
    
    $sql = "CREATE DATABASE school_db";
    mysqli_query($connect, $sql);

    mysqli_query($connect, "set session character_set_connection=utf8");
    mysqli_query($connect, "set session character_set_results=utf8");
    mysqli_query($connect, "set session character_set_client=utf8");
    
    mysqli_select_db($connect, "school_db");
    
    $sql = "CREATE TABLE subject_tbl (
        code INT PRIMARY KEY NOT NULL,
        subject_name varchar(40),
        professor VARCHAR(20),
        credit float,
        time int,
        grade int,
        semester int)
        default charset=utf8";

    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100108, '기본영어', '권성진', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100110, '논리적사유와글쓰기', '김도희', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100111, '전공탐색과생애설계1-1', '이중화', 1, 1, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100129, '콜라보인성의이해', '윤현서', 1, 1, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(300129, '기초수학', '김양곡', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(401428, '컴퓨터개론', '권오준', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(400506, '프로그래밍실습1', '박유현', 3, 4, 1, 1)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100128, '문학과삶', '이미향', 2, 2, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100030, '영어회화', '리크레이그존', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100112, '전공탐색과생애설계1-2', '김남규', 1, 1, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100120, '철학의향기와역사이야기', '최연주', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(300274, '일반물리학입문', '유일', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(400346, '이산수학', '김형석', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(401429, '프로그래밍싱습2', '우영운', 3, 4, 1, 2)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100113, '전공탐색과진로설계2-1', '장경식', 0.5, 1, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(400650, '데이터구조', '우영운', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(401154, '창의공학설계', '김현태', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(500845, '논리설계', '장경식', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(509446, '비주얼프로그래밍1', '박성훈', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(501976, '선형대수', '장경식', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(505511, '웹프로그래밍1', '이현섭', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100114, '전공탐색과진로설계2-2', '이현섭', 0.5, 1, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(500111, '객체지향프로그래밍', '장경식', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(501100, '디지털신호처리', '김현태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(509447, '비주얼프로그래밍2', '장경식', 3, 4, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(505514, '웹프로그래밍2', '이현섭', 3, 4, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(300059, '응용수학', '이유태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(503872, '컴퓨터구조', '김현태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100115, '지도교수세미나3-1', '이현섭', 0.25, 1, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(501102, '디지털영상처리1', '장경식', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(508404, '멀티미디어통신', '김현태', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(509745, '비전프로그래밍', '장경식', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(502832, '음향처리', '이현섭', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(505299, '임베디드시스템', '이유태', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(506206, '컴퓨터그래픽스1', '김현태', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100116, '지도교수세미나3-2', '이현섭', 0.25, 1, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(500891, '데이터베이스', '장경식', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(501103, '디지털영상처리2', '김현태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(508707, '캡스톤디자인1', '장경식', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(506207, '컴퓨터그래픽스2', '이현섭', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(506994, '컴퓨터알고리즘', '이유태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(504593, '확률과 통계', '김현태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100117, '지도교수세미나4-1', '이현섭', 0.25, 1, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(500029, '가상현실', '장경식', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(509017, '고급웹프로그래밍', '김현태', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(508656, '앱프로그래밍', '장경식', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(502935, '인공지능', '이현섭', 3, 3, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(507428, '자바프로그래밍', '이유태', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(508708, '캡스톤디자인2', '김현태', 3, 3, 4, 1)";
    mysqli_query($connect, $sql);

    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(100118, '지도교수세미나4-2', '이현섭', 0.25, 1, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(508402, 'HCI', '장경식', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(503436, '정보보안', '김현태', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(509449, '창업과취업(산학연계학)', '장경식', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES";
    $sql .= "(510161, '컴퓨터융합응용', '이현섭', 3, 3, 4, 2)";

    $result = mysqli_query($connect, $sql);
    
    mysqli_close($connect);
?>