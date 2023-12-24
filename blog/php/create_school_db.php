<?php
    $connect = mysqli_connect('localhost', 'root');

    #테이블들의 구성요소가 확정될 때까지 데이터베이스를 drop, create 반복할 것 같으므로 다시 추가
    $sql = "CREATE DATABASE school_db";
    mysqli_query($connect, $sql);

    mysqli_query($connect, "set session character_set_connection=utf8");
    mysqli_query($connect, "set session character_set_results=utf8");
    mysqli_query($connect, "set session character_set_client=utf8");

    mysqli_select_db($connect, "school_db");
    
    #학생 테이블
    $sql = "CREATE TABLE student_tbl (
    sno INT PRIMARY KEY NOT NULL,
    name VARCHAR(20),
    major VARCHAR(20),
    grade INT,
    semester INT,
    password VARCHAR(15))
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);

    #과목 테이블
    $sql = "CREATE TABLE subject_tbl (
    code INT PRIMARY KEY NOT NULL,
    subject_name VARCHAR(40),
    professor VARCHAR(20),
    credit FLOAT,
    time INT,
    grade INT,
    semester INT)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    #1-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100108, '기본영어', '권성진', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100110, '논리적사유와글쓰기', '김도희', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100111, '전공탐색과생애설계Ⅰ-Ⅰ', '이중화', 1, 1, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100129, '콜라보인성의이해', '윤현서', 1, 1, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300129, '기초수학', '김양곡', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400506, '컴퓨터개론', '권오준', 3, 3, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401428, '프로그래밍실습Ⅰ', '박유현', 3, 4, 1, 1)";
    mysqli_query($connect, $sql);
    #1-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100030, '영어회화', '리크레이그존', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100112, '전공탐색과생애설계Ⅰ-Ⅱ', '김남규', 1, 1, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100120, '철학의향기와역사이야기', '최연주', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100128, '문학과삶(슬로리딩)', '이미향', 2, 2, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300274, '일반물리학입문', '유일', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400346, '이산수학', '김형석', 3, 3, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401429, '프로그래밍실습Ⅱ', '우영운', 3, 4, 1, 2)";
    mysqli_query($connect, $sql);
    #2-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100113, '전공탐색과진로설계Ⅱ-Ⅰ', '장경식', 0.5, 1, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400650, '데이터구조', '우영운', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401154, '창의공학설계입문', '김현태', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500845, '논리설계', '장경식', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501976, '선형대수', '장경식', 3, 3, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (505511, '웹프로그래밍Ⅰ', '이현섭', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509446, '비주얼프로그래밍Ⅰ', '박성훈', 3, 4, 2, 1)";
    mysqli_query($connect, $sql);
    #2-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100114, '전공탐색과진로설계Ⅱ-Ⅱ', '이현섭', 0.5, 1, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300059, '응용수학', '이유태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500111, '객체지향프로그래밍', '장경식', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501100, '디지털신호처리', '김현태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (503872, '컴퓨터구조', '김현태', 3, 3, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (505514, '웹프로그래밍Ⅱ', '이현섭', 3, 4, 2, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509447, '비주얼프로그래밍Ⅱ', '장경식', 3, 4, 2, 2)";
    mysqli_query($connect, $sql);
    #3-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100115, '지도교수세미나Ⅲ-Ⅰ', '이현섭', 0.25, 1, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501102, '디지털영상처리Ⅰ', '김남규', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (502832, '음향처리', '김현태', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (505299, '임베디드시스템', '이유태', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (506206, '컴퓨터그래픽스Ⅰ', '김현태', 3, 3, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (508404, '멀티미디어통신', '김현태', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509745, '비전프로그래밍', '장경식', 3, 4, 3, 1)";
    mysqli_query($connect, $sql);
    #3-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100116, '지도교수세미나Ⅲ-Ⅱ', '이현섭', 0.25, 1, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500891, '데이터베이스', '장경식', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501103, '디지털영상처리Ⅱ', '김현태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (504593, '확률과통계', '김현태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (506207, '컴퓨터그래픽스Ⅱ', '이현섭', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (506994, '컴퓨터알고리즘', '이유태', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (508707, '캡스톤디자인Ⅰ', '장경식', 3, 3, 3, 2)";
    mysqli_query($connect, $sql);
    #4-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100117, '지도교수세미나Ⅳ-Ⅰ', '이현섭', 0.25, 1, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500029, '가상현실', '장경식', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (502935, '인공지능', '이현섭', 3, 3, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (507428, '자바프로그래밍', '이유태', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (508656, '앱프로그래밍', '장경식', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (508708, '캡스톤디자인Ⅱ', '김현태', 3, 3, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509017, '고급웹프로그래밍', '김현태', 3, 4, 4, 1)";
    mysqli_query($connect, $sql);
    #4-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100118, '지도교수세미나Ⅳ-Ⅱ', '이현섭', 0.25, 1, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (508402, 'HCI', '장경식', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (503436, '정보보안', '김현태', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509449, '창업과취업(산학연계학)', '장경식', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (510161, '컴퓨터융합응용', '이현섭', 3, 3, 4, 2)";
    mysqli_query($connect, $sql);

    #수업시간 테이블
    $sql = "CREATE TABLE schedule_tbl (
    code INT NOT NULL,
    day INT,
    period INT,
    room VARCHAR(20))
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    #1-1
    $sql = "INSERT INTO schedule_tbl VALUES
    (100108, 3, 5, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100108, 3, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100108, 4, 4, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100110, 2, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100110, 3, 2, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100110, 3, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100111, 5, 3, '정보-912')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100129, 0, 0, '온라인')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300129, 1, 1, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300129, 3, 7, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300129, 3, 8, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400506, 1, 2, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400506, 4, 2, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400506, 4, 3, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401428, 1, 3, '정보-918')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401428, 1, 4, '정보-918')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401428, 2, 4, '정보-322')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401428, 2, 5, '정보-322')";
    mysqli_query($connect, $sql);
    #1-2
    $sql = "INSERT INTO schedule_tbl VALUES
    (100030, 1, 1, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100030, 1, 2, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100030, 2, 2, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100112, 4, 2, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100120, 2, 3, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100120, 3, 2, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100120, 3, 3, '정보-914')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100128, 1, 5, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (100128, 1, 6, '정보-913')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300274, 4, 5, '산학-813')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300274, 4, 6, '산학-813')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300274, 5, 1, '산학-813')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300274, 5, 2, '산학-813')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400346, 5, 3, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400346, 5, 4, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400346, 5, 5, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401429, 2, 4, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401429, 2, 5, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401429, 4, 3, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401429, 4, 4, '산학-415')";
    mysqli_query($connect, $sql);
    #2-1
    $sql = "INSERT INTO schedule_tbl VALUES
    (100113, 2, 8, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400650, 1, 4, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400650, 1, 5, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (400650, 3, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401154, 3, 3, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401154, 3, 4, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401154, 4, 3, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (401154, 4, 4, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500845, 1, 6, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500845, 3, 1, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500845, 3, 2, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501976, 2, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501976, 2, 4, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501976, 5, 2, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505511, 1, 1, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505511, 1, 2, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505511, 4, 1, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505511, 4, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509446, 5, 4, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509446, 5, 5, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509446, 5, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509446, 5, 7, '산학-415')";
    mysqli_query($connect, $sql);
    #2-2
    $sql = "INSERT INTO schedule_tbl VALUES
    (100114, 2, 8, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300059, 5, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300059, 5, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (300059, 5, 4, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500111, 1, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500111, 3, 1, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500111, 3, 2, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501100, 1, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501100, 1, 4, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501100, 4, 1, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503872, 3, 3, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503872, 3, 4, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503872, 4, 4, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505514, 2, 1, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505514, 2, 2, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505514, 3, 6, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505514, 3, 7, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509447, 2, 3, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509447, 2, 4, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509447, 4, 5, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509447, 4, 6, '산학-417')";
    mysqli_query($connect, $sql);
    #3-1
    $sql = "INSERT INTO schedule_tbl VALUES
    (100115, 2, 8, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501102, 2, 5, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501102, 2, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501102, 5, 2, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502832, 1, 5, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502832, 1, 6, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502832, 4, 5, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505299, 3, 5, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505299, 3, 6, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505299, 5, 7, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (505299, 5, 8, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506206, 3, 1, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506206, 3, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506206, 1, 5, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508404, 4, 7, '산학-623')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508404, 4, 8, '산학-623')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508404, 5, 3, '산학-622')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508404, 5, 4, '산학-622')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509745, 2, 3, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509745, 2, 4, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509745, 4, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509745, 4, 4, '산학-417')";
    mysqli_query($connect, $sql);
    #3-2
    $sql = "INSERT INTO schedule_tbl VALUES
    (100116, 2, 8, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500891, 2, 2, '산학-622')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500891, 4, 5, '산학-622')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500891, 4, 6, '산학-622')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501103, 2, 3, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501103, 5, 3, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (501103, 5, 4, '산학-419')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (504593, 3, 2, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (504593, 3, 3, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (504593, 4, 1, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506207, 1, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506207, 4, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506207, 4, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506994, 2, 6, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506994, 3, 5, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (506994, 3, 6, '산학-417')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508707, 1, 4, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508707, 1, 5, '산학-415')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508707, 2, 1, '산학-415')";
    mysqli_query($connect, $sql);
    #4-1
    $sql = "INSERT INTO schedule_tbl VALUES
    (100117, 2, 8, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500029, 3, 7, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500029, 3, 8, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500029, 4, 7, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (500029, 4, 8, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502935, 2, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502935, 4, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (502935, 4, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (507428, 1, 1, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (507428, 1, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (507428, 1, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (507428, 1, 4, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508656, 5, 1, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508656, 5, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508656, 5, 3, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508656, 5, 4, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508708, 1, 6, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508708, 5, 6, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508708, 5, 7, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509017, 2, 3, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509017, 2, 4, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509017, 4, 5, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509017, 4, 6, '산학-411')";
    mysqli_query($connect, $sql);
    #4-2
    $sql = "INSERT INTO schedule_tbl VALUES
    (100118, 2, 8, '산학-522')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508402, 2, 5, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508402, 2, 6, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (508402, 3, 6, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503436, 2, 2, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503436, 2, 3, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (503436, 3, 4, '산학-411')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509449, 5, 6, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509449, 5, 7, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (509449, 5, 8, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (510161, 5, 1, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (510161, 5, 2, '산학-410')";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO schedule_tbl VALUES
    (510161, 5, 3, '산학-410')";
    mysqli_query($connect, $sql);

    #수강정보 테이블
    $sql = "CREATE TABLE classes_tbl (
    sno INT NOT NULL,
    code INT NOT NULL)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    
    #수강신청 테이블
    $sql = "CREATE TABLE register_tbl (
    sno INT NOT NULL,
    code INT NOT NULL,
    selected BOOLEAN)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    
    #점수 테이블
    $sql="CREATE TABLE score_tbl (
    sno INT NOT NULL,
    code INT NOT NULL,
    sgrade VARCHAR(2))
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect,$sql);

    if(is_resource($connect)) {
        mysqli_close($connect);
    }

    echo "<script>window.history.back()</script>";
?>