CREATE DATABASE reservation_system;
use reservation_system;

CREATE TABLE term (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    term varchar(255) NOT NULL DEFAULT '' COMMENT '学期'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE classroom (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(10) unsigned NOT NULL DEFAULT 0 COMMENT '教室编号'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE student (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(11) unsigned NOT NULL COMMENT '学号',
    class int(10) unsigned NOT NULL DEFAULT 0 COMMENT '班级',
    name varchar(40) NOT NULL DEFAULT '' COMMENT '姓名',
    password varchar(255) NOT NULL COMMENT '密码',
    remember_token VARCHAR (100)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE teacher (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(11) unsigned NOT NULL COMMENT '教师编号',
    name varchar(40) unsigned NOT NULL DEFAULT 0 COMMENT '姓名',
    password varchar(255) NOT NULL COMMENT '密码',
    remeber_token varchar(100)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE experiment (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL DEFAULT '' COMMENT '实验名字',
    introduction text NOT NULL COMMENT '实验简介和要求'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE term_experiment (
    term_id int(10) unsigned NOT NULL,
    experiment int(10) unsigned NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE experiment_detail (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date timestamp COMMENT '实验的日期',
    experiment_id int(10) unsigned NOT NULL DEFAULT 0,
    teacher_id int(10) unsigned NOT NULL DEFAULT 0,
    quotas smallint unsigned NOT NULL DEFAULT 0 COMMENT '名额',
    use_quotas smallint unsigned NOT NULL DEFAULT 0 COMMENT '已用名额'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE student_experiment_detail (
    student_id int(10) unsigned NOT NULL DEFAULT 0,
    experiment_detail_id int(10) unsigned NOT NULL DEFAULT 0
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;