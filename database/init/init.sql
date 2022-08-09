DROP DATABASE IF EXISTS master;    


CREATE DATABASE master;    
\c master
CREATE TABLE Urak (
   name varchar(255) NOT NULL
);

INSERT INTO Urak (name) VALUES ('uram');