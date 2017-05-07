# JKAL
CMSC389N Group Project

# Setting up database
<!--- 
creating user and giving privileges
-->
create user 'csuser'@'localhost' IDENTIFIED BY 'helloworld';
grant all on shopdb.accounts to 'csuser'@'localhost';
grant all on shopdb.items to 'csuser'@'localhost';
grant all on shopdb.wishlists to 'csuser'@'localhost';

create database shopdb;

use shopdb;

<!---
Accounts database:
Username(varchar) -- any account can buy
Email(varchar)
Password(varchar)
First name(varchar)
Last name(varchar)
-->
create table accounts(username varchar(20) NOT NULL PRIMARY KEY, email varchar(30), password varchar(100), firstname varchar(20), lastname varchar(20));

<!---
Items database:
- id int not null AUTO_INCREMENT PRIMARY KEY
- Image(blob)
- Price(decimal)
- Name(varchar)
- Type of item(varchar)
- description(text)
- username(varchar) -- foreign key from accounts
- quantity(int)
- sold(int)
-->
create table items(id int NOT NULL AUTO_INCREMENT PRIMARY KEY, image blob, price decimal(6,2), name varchar(40), type varchar(40), description text, username varchar(20) NOT NULL, quantity int, sold int, FOREIGN KEY (username) REFERENCES accounts(username));

<!---
Wishlists database:
Username(varchar) -- foreign key from accounts
id(int) -- foreign key from items
-->
create table wishlists(username varchar(20) NOT NULL, id int NOT NULL, FOREIGN KEY(username) REFERENCES accounts(username), FOREIGN KEY(id) REFERENCES items(id));
