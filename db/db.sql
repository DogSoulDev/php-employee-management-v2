-- Database creation
DROP DATABASE IF EXISTS employee_management_v2;
CREATE DATABASE IF NOT EXISTS employee_management_v2;
USE employee_management_v2;

-- Creation of the tables
CREATE TABLE users(
user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
password varChar(50) NOT NULL,
email varChar(50) NOT NULL
);

CREATE TABLE employees(
employee_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
last_name VARCHAR(50),
email VARCHAR(50) UNIQUE,
gender_id ENUM("m", "f") NOT NULL,
age INT(2) NULL,
phone_number INT(9) NOT NULL,
avatar VARCHAR(200),
position VARCHAR(50)
);

CREATE TABLE address(
employee_id int,
street_address VARCHAR (100),
state VARCHAR(50),
city VARCHAR(50),
postal_code INT(5),
FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- Insert of data
INSERT INTO users (name, password, email)
VALUES
("admin", "123456", "admin@assemblerschool.com");

INSERT INTO employees (name, last_name, email, gender_id, avatar, age, phone_number, position)
VALUES
("Rack", "Lei", "jackon@network.com", "m", "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg", 24, 738362767, "ENG"),
("John", "Doe", "jhondoe@foo.com", "m", "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg", 34, 638362767,"Pokemon Trainer"),
("Leila", "Mills", "mills@leila.com", "f", "https://m.media-amazon.com/images/M/MV5BMzI5NDIzNTQ1Nl5BMl5BanBnXkFtZTgwMjQ0Mzc1MTE@._V1_UY256_CR4,0,172,256_AL_.jpg", 26, 638362767, "Writer"),
("Richard", "Desmond", "dismond@foo.com", "m", NULL, 30, 638362767,"Science Major"),
("Susan", "Smith", "susanmith@baz.com", "f", NULL, 28, 638362767, "IT"),
("Brad", "Simpson", "brad@foo.com", "m", NULL, 40, 638362767, "IT"),
("Neil", "Walker", "walkerneil@baz.com", "m", NULL, 38, 638362767, "IT"),
("Rack", "Jackon", "rack@network.com", "m", NULL, 22, 638362767, "Teacher"),
("Homer", "Eustasio", "homer@gmail.com", "m", NULL, 34, 638362767, "Nice position"),
("Sandra", "Foo", "sandra@foo.com", "f", NULL, 34, 638362767, "Awful Position");

INSERT INTO address (employee_id, street_address, state, city, postal_code)
VALUES
(1,"126", "CA", "New York",  "85716"),
(2,"126", "CA", "New York", "09563"),
(3,"126", "GEO", "Atlanta" , "01928"),
(4,"126", "CA", "New York", "17345"),
(5,"126", "CA", "New York", "68573"),
(6,"126", "CA", "New York", "09857"),
(7,"126", "CA", "San Diego", "39671"),
(8,"126", "CA", "San Jone", "39001"),
(9,"126", "CA", "New York", "09274"),
(10,"126", "CA", "San Jone", "39221");
