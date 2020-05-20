create TABLE product
(
	id varchar (36) PRIMARY KEY,
    name varchar (64),
    description varchar(128),
    quantity int,
  	price int
);

INSERT INTO Product VALUES
('ebb5c735-0308-4e3c-9aea-8a270aebfe15', 'baju', 'baju lebaran murah',5, 100000),
 ('ebb5c735-0308-4e3c-9aea-8a270aebfe16', 'celana', 'celana lebaran murah',5, 100000);