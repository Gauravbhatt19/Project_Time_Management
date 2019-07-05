CREATE DATABASE time_mngmnt_db;
USE time_mngmnt_db;
CREATE TABLE main_table(id INT PRIMARY KEY AUTO_INCREMENT,task VARCHAR(300) NOT NULL, strt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP, end_time TIMESTAMP NULL);
INSERT main_table(task,strt_time,end_time) VALUES('Project Time Tracking App','2019-01-31 20:20:00','2019-01-31 23:55:00');
