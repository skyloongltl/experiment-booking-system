CREATE DATABASE reservation_system;
use reservation_system;

CREATE TABLE term (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    term varchar(255) NOT NULL COMMENT '学期'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE classroom (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(10) unsigned NOT NULL COMMENT '教室编号'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE student (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(11) unsigned NOT NULL COMMENT '学号',
    class int(10) unsigned NOT NULL DEFAULT 0 COMMENT '班级',
    name varchar(40) NOT NULL DEFAULT '' COMMENT '姓名',
    password varchar(255) NOT NULL COMMENT '密码'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE teacher (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number int(11) unsigned NOT NULL COMMENT '教师编号',
    name varchar(40) NOT NULL COMMENT '姓名',
    password varchar(255) NOT NULL COMMENT '密码'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE experiment (
	  id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL COMMENT '实验名字',
    introduction VARCHAR(255) NOT NULL DEFAULT '' COMMENT '实验简介和要求'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

CREATE TABLE term_experiment (
    term_id int(10) unsigned NOT NULL,
    experiment_id int(10) unsigned NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE experiment_detail (
    id int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date timestamp NOT NULL COMMENT '实验的日期',
    experiment_id int(10) unsigned NOT NULL,
    teacher_id int(10) unsigned NOT NULL,
    quotas smallint unsigned NOT NULL COMMENT '名额',
    use_quotas smallint unsigned NOT NULL COMMENT '已用名额'
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE student_experiment_detail (
    student_id int(10) unsigned NOT NULL,
    experiment_detail_id int(10) unsigned NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE student ADD INDEX student_number (`number`);
ALTER TABLE teacher ADD INDEX teacher_number (`number`);
ALTER TABLE term_experiment ADD INDEX term_id (`term_id`);
AlTER TABLE experiment_detail ADD INDEX teacher_id (`teacher_id`);
ALTER TABLE student_experiment_detail ADD INDEX student_id (`student_id`);