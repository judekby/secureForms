CREATE DATABASE facebook;

CREATE TABLE utilisateurs (
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password_hash CHAR(60) NOT NULL,
  activation_code CHAR(32) 
);


CREATE TABLE OneTimePassword (
    utilisateur_id INTEGER REFERENCES utilisateurs(id),
    code CHAR(32) NOT NULL,
    creation_time TIMESTAMP NOT NULL
);
