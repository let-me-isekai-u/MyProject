create database MyDatabase;
create table if not exists student(
	id int(10) not null unique auto_increment,
	name varchar(100),
    email varchar(55),
	image varchar(255),
    username varchar(50),
    password varchar(50)
);


select * from student;
insert into student(name, email)
values('ABC', 'ABC@gmail.com'),
	  ('XYZ', 'XYZ@gmail.com'),
      ('QKA', 'QKA@gmail.com')
	
	  
