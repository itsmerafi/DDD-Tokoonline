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

 CREATE TABLE cart (
    cart_id varchar(128) PRIMARY KEY,
    product_id varchar(36),
    unit_price DECIMAL(8,2),
    amount int,
    FOREIGN KEY (product_id) REFERENCES product(id)
    );

INSERT INTO cart VALUES ('user_id', 'ebb5c735-0308-4e3c-9aea-8a270aebfe15', 80000, 2),
('user_id', 'ebb5c735-0308-4e3c-9aea-8a270aebfe15', 100000, 2);