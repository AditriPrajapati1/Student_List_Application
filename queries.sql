CREATE DATABASE school_db;


USE school_db;

CREATE TABLE students(
		id INT PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(100),
    	email VARCHAR(100),
    	course VARCHAR(100)
);

INSERT INTO students(name,email,course) VALUES 
	("Ram","ram12@gmail.com","Computer Science"),
    ("Sita","sita33@gmail.com","Business"),
    ("Hari","hari12@gmail.com","Computer Science"),
    ("Sam","sam33@gmail.com","Business"),
    ("Tom","tom12@gmail.com","Cyber Security");