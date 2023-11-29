<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "";
    
    $connect = mysqli_connect($db_host, $db_user, $db_pw);
    
    $sql = "create database deu_db";
    mysqli_query($connect, $sql);
    
    mysqli_select_db($connect, "deu_db");
    
    $sql = "create table student_tbl (
        SNO int primary key not null,
        NAME varchar(20),
        MAJOR varchar(20),
        GRADE int,
        PASSWORD varchar(255))
        default charset=utf8";
    mysqli_query($connect, $sql);

    $sql = "insert into student_tbl values
        (20200001, '홍길동', '응용소프트웨어공학', 2, null)";
    mysqli_query($connect, $sql);

    $sql = "create table subject_tbl (
        CODE int primary key not null,
        SUBJECT_NAME varchar(20),
        PROFESSOR_NAME varchar(20),
        CREDIT int)
        default charset=utf8";
    mysqli_query($connect, $sql);

    $sql = "insert into subject_tbl values
        (100001, '전공탐색과생애설계1-1', '이중화', 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (400001, '프로그래밍실습1', '박유현', 3)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (100002, '전공탐색과생애설계1-2', '김남규', 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (400002, '프로그래밍실습2', '우영운', 3)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (100003, '전공탐색과생애설계2-1', '장경식', 0.5)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (400003, '데이터구조', '우영운', 3)";
    mysqli_query($connect, $sql);
    $sql = "insert into subject_tbl values
        (500001, '웹프로그래밍1', '이현섭', 3)";
    mysqli_query($connect, $sql);

    $sql = "create table classes_tbl (
        SNO int not null,
        CODE int not null,
        YEAR int,
        SEMESTER int)
        default charset=utf8";
    mysqli_query($connect, $sql);

    $sql = "insert into classes_tbl values
        (20200001, 100001, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 400001, 2020, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 100002, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 400002, 2020, 2)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 100003, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 400003, 2023, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into classes_tbl values
        (20200001, 500001, 2023, 1)";
    mysqli_query($connect, $sql);

    $sql = "create table score_tbl (
        SNO int not null,
        CODE int not null,
        SCORE int)
        default charset=utf8";
    mysqli_query($connect, $sql);

    $sql = "insert into score_tbl values
        (20200001, 100001, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 400001, 80)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 100002, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 400002, 89)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 100003, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 400003, 94)";
    mysqli_query($connect, $sql);
    $sql = "insert into score_tbl values
        (20200001, 500001, 100)";
    mysqli_query($connect, $sql);

    $sql = "create table schedule_tbl (
        CODE int not null,
        DAY int,
        PERIOD int)
        default charset=utf8";
    mysqli_query($connect, $sql);
    
    $sql = "insert into schedule_tbl values
        (100003, 2, 8)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (400003, 1, 4)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (400003, 1, 5)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (400003, 3, 6)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (500001, 1, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (500001, 1, 2)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (500001, 4, 1)";
    mysqli_query($connect, $sql);
    $sql = "insert into schedule_tbl values
        (500001, 4, 2)";
    mysqli_query($connect, $sql);

    /*
    $sql = "select * from student_tbl";
    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_fields($result); //필드 개수
    $count = mysqli_num_rows($result); //레코드 개수
    while ($rows = mysqli_fetch_row($result)) {
        for ($i = 0; $i < mysqli_num_fields($result); $i++) {
            $rows[$i];
            //레코드 모두 출력
        }
    }
    */
    
    if(is_resource($connect)) {
        mysqli_close($connect);
    }
?>