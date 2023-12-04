<?php
    $connect = mysqli_connect('localhost', 'root');
    
    $sql = "CREATE database school_db";
    mysqli_query($connect, $sql);
    
    mysqli_select_db($connect, "school_db");
    
    #학생 테이블
    $sql = "CREATE TABLE student_tbl (
    sno INT PRIMARY KEY NOT NULL,
    name VARCHAR(20),
    grade INT,
    major VARCHAR(20),
    password VARCHAR(255))
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);

    #임시 학생정보
    $sql = "INSERT INTO student_tbl VALUES
    (20200001, '홍길동', 2, '응용소프트웨어공학', 0000)";
    mysqli_query($connect, $sql);

    #과목 테이블
    $sql = "CREATE TABLE subject_tbl (
    code INT PRIMARY KEY NOT NULL,
    subject_name VARCHAR(20),
    professor VARCHAR(20),
    credit INT)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    #1-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100108, '기본영어', '권성진', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100110, '논리적사유와글쓰기', '김도희', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100111, '전공탐색과생애설계Ⅰ-Ⅰ', '이중화', 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100129, '콜라보인성의이해', '윤현서', 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300129, '기초수학', '김양곡', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400506, '컴퓨터개론', '권오준', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401428, '프로그래밍실습Ⅰ', '박유현', 3)";
    mysqli_query($connect, $sql);
    #1-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100030, '영어회화', '리크레이그존', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100112, '전공탐색과생애설계Ⅰ-Ⅱ', '김남규', 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100120, '철학의향기와역사이야기', '최연주', 1)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (100128, '문학과삶(슬로리딩)', '이미향', 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300274, '일반물리학입문', '유일', 2)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400346, '이산수학', '김형석', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401429, '프로그래밍실습Ⅱ', '우영운', 3)";
    mysqli_query($connect, $sql);
    #2-1
    $sql = "INSERT INTO subject_tbl VALUES
    (100113, '전공탐색과진로설계Ⅱ-Ⅰ', '장경식', 0.5)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (400650, '데이터구조', '우영운', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (401154, '창의공학설계입문', '김현태', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500845, '논리설계', '장경식', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501976, '선형대수', '장경식', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (505511, '웹프로그래밍Ⅰ', '이현섭', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509446, '비주얼프로그래밍Ⅰ', '박성훈', 3)";
    mysqli_query($connect, $sql);
    #2-2
    $sql = "INSERT INTO subject_tbl VALUES
    (100114, '전공탐색과진로설계Ⅱ-Ⅱ', '이현섭', 0.5)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (300059, '응용수학', '이유태', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (500111, '객체지향프로그래밍', '장경식', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (501100, '디지털신호처리', '김현태', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (503872, '컴퓨터구조', '김현태', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (505514, '웹프로그래밍Ⅱ', '이현섭', 3)";
    mysqli_query($connect, $sql);
    $sql = "INSERT INTO subject_tbl VALUES
    (509447, '비주얼프로그래밍Ⅱ', '장경식', 3)";
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

    #수강정보 테이블
    $sql = "CREATE TABLE classes_tbl (
    sno INT NOT NULL,
    code INT NOT NULL,
    year INT,
    semester INT)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);
    
    #수강신청 테이블
    $sql = "CREATE TABLE subjectsToRegister_tbl (
    sno INT NOT NULL,
    code INT NOT NULL,
    selected BOOLEAN)
    DEFAULT CHARSET=UTF8";
    mysqli_query($connect, $sql);

    if(is_resource($connect)) {
        mysqli_close($connect);
    }

    echo "<script>window.history.back()</script>";
?>