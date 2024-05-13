# FedUp
Eproject For Semester Two, a satirical website of FedEx courier service

# How to get started

1. Everyone needs to have GIT installed
2. Everyone needs to have a GitHub account
3. Send your GitHub Email address to Hassam via Whatsapp
4. Hassam will send invites to Repository that you'll accept via Email
5. Clone repository to your computers
6. Begin working on delegated tasks

# Delegated Tasks

1. Creation of Home-Page
2. Creation of Sign Up and Login Pages
3. Creation of Admin panel
4. Creation of database and tables
5. 

# Database queries

1) CREATE DATABASE fedupdb;
2) CREATE TABLE packages(
	package_id INT PRIMARY KEY AUTO_INCREMENT,
    from_address VARCHAR(225),
    to_address VARCHAR(225),
  	delivery_type VARCHAR(225),
    special_instructions VARCHAR(225)
);
3) CREATE TABLE users(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(225),
    Email VARCHAR(225),
  	Contact VARCHAR(225),
    Password VARCHAR(225)
);
4) CREATE TABLE Admin(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(225),
    LastName VARCHAR(225),
  	Email VARCHAR(225),
    Phone VARCHAR(50),
    Password VARCHAR(100),
    Account_type VARCHAR(50)
);
5) CREATE TABLE Agent(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(225),
    LastName VARCHAR(225),
  	Email VARCHAR(225),
    Phone VARCHAR(50),
    Password VARCHAR(100),
    Account_type VARCHAR(50)
);
6) CREATE TABLE Customer(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(225),
    LastName VARCHAR(225),
  	Email VARCHAR(225),
    Phone VARCHAR(50),
    Password VARCHAR(100),
    Account_type VARCHAR(50)
);